<?php
namespace App\Services\Payme;

use App\Services\Payme\Database;
use App\Services\Payme\Format;
use App\Services\Payme\Merchant;
use App\Services\Payme\AllTransaction;
use App\Services\Payme\PaycomException;
use App\Services\Payme\PaycomTransaction;
use App\Services\Payme\Response;
use App\Services\Payme\Request;
use App\Models\WalletBalance;

class Application extends PaycomException
{
    public $config;
    public $request;
    public $response;
    public $merchant;

    /**
     * Application constructor.
     * @param array $config configuration array with <em>merchant_id</em>, <em>login</em>, <em>keyFile</em> keys.
     */
    public function __construct()
    {
        $this->config   = config('paycom');
        $this->request  = new Request();
        $this->response = new Response($this->request);
        $this->merchant = new Merchant($this->config);
    }

    /**
     * Authorizes session and handles requests.
     */
    public function run()
    {
        try {
            // authorize session
            $this->merchant->Authorize($this->request->id);

            // handle request
            switch ($this->request->method) {
                case 'CheckPerformTransaction':
                    $this->CheckPerformTransaction();
                    break;
                case 'CheckTransaction':
                    $this->CheckTransaction();
                    break;
                case 'CreateTransaction':
                    $this->CreateTransaction();
                    break;
                case 'PerformTransaction':
                    $this->PerformTransaction();
                    break;
                case 'CancelTransaction':
                    $this->CancelTransaction();
                    break;
                case 'ChangePassword':
                    $this->ChangePassword();
                    break;
                case 'GetStatement':
                    $this->GetStatement();
                    break;
                default:
                    $this->response->error(
                        PaycomException::ERROR_METHOD_NOT_FOUND,
                        'Method not found.',
                        $this->request->method
                    );
                    break;
            }
        } catch (PaycomException $exc) {
            $exc->send();
        }
    }

    private function CheckPerformTransaction()
    {
        $order = new AllTransaction($this->request->id);
        $order->find($this->request->params['account']);

        // validate parameters
        $order->validate($this->request->params);

        // todo: Check is there another active or completed transaction for this order
        $transaction = new PaycomTransaction();
        $found       = $transaction->find($this->request->params);
        if ($found && ($found->state == PaycomTransaction::STATE_CREATED || $found->state == PaycomTransaction::STATE_COMPLETED)) {
            $this->response->error(
                PaycomException::ERROR_COULD_NOT_PERFORM,
                'There is other active/completed transaction for this order.'
            );
        }

        // if control is here, then we pass all validations and checks
        // send response, that order is ready to be paid.
        $this->response->send(['allow' => true]);
    }

    private function CheckTransaction()
    {
        // todo: Find transaction by id
        $transaction = new PaycomTransaction();
        $found       = $transaction->find($this->request->params);
        if (!$found) {
            $this->response->error(
                PaycomException::ERROR_TRANSACTION_NOT_FOUND,
                'Transaction not found.'
            );
        }

        // todo: Prepare and send found transaction
        $this->response->send([
            'create_time'  => Format::datetime2timestamp($found->create_time),
            'perform_time' => Format::datetime2timestamp($found->perform_time) ?: 0,
            'cancel_time'  => Format::datetime2timestamp($found->cancel_time) ?: 0,
            'transaction'  => $found->id,
            'state'        => $found->state,
            'reason'       => isset($found->reason) ? 1 * $found->reason : null,
        ]);
    }

    private function CreateTransaction()
    {
        $order = new AllTransaction($this->request->id);
        $order->find($this->request->params['account']);

        // validate parameters
        $order->validate($this->request->params);

        // todo: Check, is there any other transaction for this order/service
        $transaction = new PaycomTransaction();
        $found       = $transaction->find(['account' => $this->request->params['account']]);
        if ($found) {
            if (($found->state == PaycomTransaction::STATE_CREATED || $found->state == PaycomTransaction::STATE_COMPLETED)
                && $found->paycom_transaction_id !== $this->request->params['id']) {
                $this->response->error(
                    PaycomException::ERROR_INVALID_ACCOUNT,
                    'There is other active/completed transaction for this order.'
                );
            }
        }

        // todo: Find transaction by id
        $transaction = new PaycomTransaction();
        $found       = $transaction->find($this->request->params);

        if ($found) {
            if ($found->state != PaycomTransaction::STATE_CREATED) { // validate transaction state
                $this->response->error(
                    PaycomException::ERROR_COULD_NOT_PERFORM,
                    'Transaction found, but is not active.'
                );
            } elseif ($found->isExpired()) { // if transaction timed out, cancel it and send error
                $found->cancel(PaycomTransaction::REASON_CANCELLED_BY_TIMEOUT);
                $this->response->error(
                    PaycomException::ERROR_COULD_NOT_PERFORM,
                    'Transaction is expired.'
                );
            } else { // if transaction found and active, send it as response
                $this->response->send([
                    'create_time' => Format::datetime2timestamp($found->create_time),
                    'transaction' => $found->id,
                    'state'       => $found->state,
                    'receivers'   => $found->receivers,
                ]);
            }
        } else { // transaction not found, create new one

            // validate new transaction time
            if (Format::timestamp2milliseconds(1 * $this->request->params['time']) - Format::timestamp(true) >= PaycomTransaction::TIMEOUT) {
                $this->response->error(
                    PaycomException::ERROR_INVALID_ACCOUNT,
                    PaycomException::message(
                        'С даты создания транзакции прошло ' . PaycomTransaction::TIMEOUT . 'мс',
                        'Tranzaksiya yaratilgan sanadan ' . PaycomTransaction::TIMEOUT . 'ms o`tgan',
                        'Since create time of the transaction passed ' . PaycomTransaction::TIMEOUT . 'ms'
                    ),
                    'time'
                );
            }

            // create new transaction
            // keep create_time as timestamp, it is necessary in response
            $create_time                        = Format::timestamp(true);
            $transaction->paycom_transaction_id = $this->request->params['id'];
            $transaction->paycom_time           = $this->request->params['time'];
            $transaction->paycom_time_datetime  = Format::timestamp2datetime($this->request->params['time']);
            $transaction->create_time           = Format::timestamp2datetime($create_time);
            $transaction->state                 = PaycomTransaction::STATE_CREATED;
            $transaction->amount                = $this->request->amount;
            $transaction->transaction_id        = $this->request->account('transaction_id');
            $transaction->save(); // after save $transaction->id will be populated with the newly created transaction's id.

            // send response
            $this->response->send([
                'create_time' => Format::datetime2timestamp($transaction->create_time),
                'transaction' => $transaction->id,
                'state'       => $transaction->state,
                'receivers'   => null,
            ]);
        }
    }

    private function PerformTransaction()
    {
        $transaction = new PaycomTransaction();
        // search transaction by id
        $found = $transaction->find($this->request->params);

        // if transaction not found, send error
        if (!$found) {
            $this->response->error(PaycomException::ERROR_TRANSACTION_NOT_FOUND, 'Transaction not found.');
        }

        switch ($found->state) {
            case PaycomTransaction::STATE_CREATED: // handle active transaction
                if ($found->isExpired()) { // if transaction is expired, then cancel it and send error
                    $found->cancel(PaycomTransaction::REASON_CANCELLED_BY_TIMEOUT);
                    $this->response->error(
                        PaycomException::ERROR_COULD_NOT_PERFORM,
                        'Transaction is expired.'
                    );
                } else { // perform active transaction
                    // todo: Mark order/service as completed
                    $params = ['transaction_id' => $found->transaction_id];
                    $order  = new AllTransaction($this->request->id);
                    $order->find($params);
                    $order->changeState(AllTransaction::STATE_PAY_ACCEPTED);
                    $order->changeStatus(AllTransaction::STATUS_SUCCESS);
                    
                    // User Wallet create or update balance
                    WalletBalance::walletBalanceUpdateOrCreate($order->amount);

                    // todo: Mark transaction as completed
                    $perform_time        = Format::timestamp(true);
                    $found->state        = PaycomTransaction::STATE_COMPLETED;
                    $found->perform_time = Format::timestamp2datetime($perform_time);
                    $found->save();

                    $this->response->send([
                        'transaction'  => $found->id,
                        'perform_time' => $perform_time,
                        'state'        => $found->state,
                    ]);
                }
                break;

            case PaycomTransaction::STATE_COMPLETED: // handle complete transaction
                // todo: If transaction completed, just return it
                $this->response->send([
                    'transaction'  => $found->id,
                    'perform_time' => Format::datetime2timestamp($found->perform_time),
                    'state'        => $found->state,
                ]);
                break;

            default:
                // unknown situation
                $this->response->error(
                    PaycomException::ERROR_COULD_NOT_PERFORM,
                    'Could not perform this operation.'
                );
                break;
        }
    }

    private function CancelTransaction()
    {
        $transaction = new PaycomTransaction();

        // search transaction by id
        $found = $transaction->find($this->request->params);

        // if transaction not found, send error
        if (!$found) {
            $this->response->error(PaycomException::ERROR_TRANSACTION_NOT_FOUND, 'Transaction not found.');
        }

        switch ($found->state) {
            // if already cancelled, just send it
            case PaycomTransaction::STATE_CANCELLED:
            case PaycomTransaction::STATE_CANCELLED_AFTER_COMPLETE:
                $this->response->send([
                    'transaction' => $found->id,
                    'cancel_time' => Format::datetime2timestamp($found->cancel_time),
                    'state'       => $found->state,
                ]);
                break;

            // cancel active transaction
            case PaycomTransaction::STATE_CREATED:
                // cancel transaction with given reason
                $found->cancel(1 * $this->request->params['reason']);
                // after $found->cancel(), cancel_time and state properties populated with data

                // change order state to cancelled
                $order = new AllTransaction($this->request->id);
                $order->find($this->request->params);
                $order->id = $found->transaction_id;
                $order->changeState(AllTransaction::STATE_CANCELLED);
                $order->changeStatus(AllTransaction::STATUS_REJECTED);
                
                // send response
                $this->response->send([
                    'transaction' => $found->id,
                    'cancel_time' => Format::datetime2timestamp($found->cancel_time),
                    'state'       => $found->state,
                ]);
                break;

            case PaycomTransaction::STATE_COMPLETED:
                // find order and check, whether cancelling is possible this order
                $order = new AllTransaction($this->request->id);

                $order->find($this->request->params);

                $order->id = $found->transaction_id;
                
                if ($order->allowCancel()) {
                    // cancel and change state to cancelled
                    $found->cancel(1 * $this->request->params['reason']);
                    // after $found->cancel(), cancel_time and state properties populated with data

                    $order->changeState(AllTransaction::STATE_CANCELLED);

                    // send response
                    $this->response->send([
                        'transaction' => $found->id,
                        'cancel_time' => Format::datetime2timestamp($found->cancel_time),
                        'state'       => $found->state,
                    ]);
                } else {
                    // todo: If cancelling after performing transaction is not possible, then return error -31007
                    $this->response->error(
                        PaycomException::ERROR_COULD_NOT_CANCEL,
                        'Could not cancel transaction. Order is delivered/Service is completed.'
                    );
                }
                break;
        }
    }

    private function ChangePassword()
    {
        // validate, password is specified, otherwise send error
        if (!isset($this->request->params['password']) || !trim($this->request->params['password'])) {
            $this->response->error(PaycomException::ERROR_INVALID_ACCOUNT, 'New password not specified.', 'password');
        }

        // if current password specified as new, then send error
        if ($this->merchant->config['key'] == $this->request->params['password']) {
            $this->response->error(PaycomException::ERROR_INSUFFICIENT_PRIVILEGE, 'Insufficient privilege. Incorrect new password.');
        }

        // todo: Implement saving password into data store or file
        // example implementation, that saves new password into file specified in the configuration
        if (!file_put_contents($this->config['keyFile'], $this->request->params['password'])) {
            $this->response->error(PaycomException::ERROR_INTERNAL_SYSTEM, 'Internal System Error.');
        }

        // if control is here, then password is saved into data store
        // send success response
        $this->response->send(['success' => true]);
    }

    private function GetStatement()
    {
        // validate 'from'
        if (!isset($this->request->params['from'])) {
            $this->response->error(PaycomException::ERROR_INVALID_ACCOUNT, 'Incorrect period.', 'from');
        }

        // validate 'to'
        if (!isset($this->request->params['to'])) {
            $this->response->error(PaycomException::ERROR_INVALID_ACCOUNT, 'Incorrect period.', 'to');
        }

        // validate period
        if (1 * $this->request->params['from'] >= 1 * $this->request->params['to']) {
            $this->response->error(PaycomException::ERROR_INVALID_ACCOUNT, 'Incorrect period. (from >= to)', 'from');
        }

        // get list of transactions for specified period
        $transaction  = new PaycomTransaction();
        $transactions = $transaction->report($this->request->params['from'], $this->request->params['to']);

        // send results back
        $this->response->send(['transactions' => $transactions]);
    }
}