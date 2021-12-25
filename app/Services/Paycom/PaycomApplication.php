<?php
namespace App\Services\Paycom;

use App\Domain\Booking\Models\Booking;
use App\Models\All_transaction as Transaction;
use App\Services\Paycom\helpers\FormatHelper;
use App\Services\Paycom\models\PaycomTransaction;

class PaycomApplication
{
    public $config;
    public $request;
    public $response;
    public $merchant;

    /**
     * PaycomApplication constructor.
     *
     * @param array $config configuration array with 'merchant_id', 'login', 'key' keys.
     *
     * @throws PaycomException
     */
    public function __construct($config)
    {
        $this->config   = $config;
        $this->request  = new PaycomRequest();
        $this->response = new PaycomResponse($this->request);
        $this->merchant = new PaycomMerchant($this->config);
    }


    /**
     * Authorizes session and handles requests.
     */
    public function run()
    {
        try {
            $this->merchant->Authorize($this->request->id);

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

    /**
     * @throws PaycomException
     */
    private function CheckPerformTransaction()
    {
        $this->validateBooking();
        $this->validateTransaction();
        $this->response->send(['allow' => true]);
    }

    /**
     * @throws PaycomException
     */
    private function CheckTransaction()
    {
        $transaction = $this->findTransaction();
        if (!$transaction) {
            $this->response->error(
                PaycomException::ERROR_TRANSACTION_NOT_FOUND,
                'Transaction not found.'
            );
        }

        $this->response->send([
            'create_time' => FormatHelper::datetime2timestamp($transaction->create_time),
            'perform_time' => FormatHelper::datetime2timestamp($transaction->perform_time ?? 0),
            'cancel_time' => FormatHelper::datetime2timestamp($transaction->cancel_time ?? 0),
            'transaction' => $transaction->paycom_transaction_id,
            'state' => $transaction->state,
            'reason' => isset($transaction->reason) ? 1 * $transaction->reason : null,
        ]);
    }

    /**
     * @throws PaycomException
     */
    private function CreateTransaction()
    {
        $this->validateBooking();
        $transaction = $this->findTransaction();
        if ($transaction) {
            if (($transaction->state == PaycomTransaction::STATE_CREATED
                    || $transaction->state == PaycomTransaction::STATE_COMPLETED)
                && $transaction->paycom_transaction_id != $this->request->params['id']) {
                $this->response->error(
                    PaycomException::ERROR_INVALID_ACCOUNT,
                    'There is other active/completed transaction for this order.'
                );
            }
        }

        if ($transaction) {
            if ($transaction->state != PaycomTransaction::STATE_CREATED) {
                $this->response->error(
                    PaycomException::ERROR_COULD_NOT_PERFORM,
                    'Transaction transaction, but is not active.'
                );
            } elseif ($transaction->isExpired()) {
                $transaction->cancel(PaycomTransaction::REASON_CANCELLED_BY_TIMEOUT);
                $this->response->error(
                    PaycomException::ERROR_COULD_NOT_PERFORM,
                    'Transaction is expired.'
                );
            } else {
                $this->response->send([
                    'create_time' => FormatHelper::datetime2timestamp($transaction->create_time),
                    'transaction' => $transaction->paycom_transaction_id,
                    'state' => $transaction->state,
                    'receivers' => $transaction->receivers,
                ]);
            }
        } else {

            if (FormatHelper::timestamp2milliseconds(1 * $this->request->params['time']) - FormatHelper::timestamp(true) >= PaycomTransaction::TIMEOUT) {
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

            $create_time = FormatHelper::timestamp(true);
            $transaction = new PaycomTransaction();
            $transaction->paycom_transaction_id = $this->request->params['id'];
            $transaction->paycom_time = $this->request->params['time'];
            $transaction->paycom_time_datetime = FormatHelper::timestamp2datetime($this->request->params['time']);
            $transaction->create_time = FormatHelper::timestamp2datetime($create_time);
            $transaction->state = PaycomTransaction::STATE_CREATED;
            $transaction->amount = $this->request->amount;
            $transaction->booking_id = $this->request->account('booking_id');
            $transaction->save();

            $this->response->send([
                'create_time' => $create_time,
                'transaction' => $transaction->paycom_transaction_id,
                'state' => $transaction->state,
                'receivers' => null,
            ]);
        }
    }


    /**
     * @throws PaycomException
     */
    private function PerformTransaction()
    {
        $transaction = $this->findTransaction();

        if (!$transaction) {
            $this->response->error(PaycomException::ERROR_TRANSACTION_NOT_FOUND, 'Transaction not found.');
        }

        switch ($transaction->state) {
            case PaycomTransaction::STATE_CREATED:
                if ($transaction->isExpired()) {
                    $transaction->cancel(PaycomTransaction::REASON_CANCELLED_BY_TIMEOUT);
                    $this->response->error(
                        PaycomException::ERROR_COULD_NOT_PERFORM,
                        'Transaction is expired.'
                    );
                } else {
                    Booking::where('id', $transaction->booking_id)->update(['paid' => Booking::PAID_UZCARD]);

                    // todo: Mark transaction as completed
                    $perform_time = FormatHelper::timestamp(true);
                    $transaction->state = PaycomTransaction::STATE_COMPLETED;
                    $transaction->perform_time = FormatHelper::timestamp2datetime($perform_time);
                    $transaction->save();

                    $this->response->send([
                        'transaction' => $transaction->paycom_transaction_id,
                        'perform_time' => $perform_time,
                        'state' => $transaction->state,
                    ]);
                }
                break;

            case PaycomTransaction::STATE_COMPLETED: // handle complete transaction
                // todo: If transaction completed, just return it
                $this->response->send([
                    'transaction' => $transaction->paycom_transaction_id,
                    'perform_time' => FormatHelper::datetime2timestamp($transaction->perform_time),
                    'state' => $transaction->state,
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


    /**
     * @throws PaycomException
     */
    private function CancelTransaction()
    {
        $transaction = $this->findTransaction();

        if (!$transaction) {
            $this->response->error(PaycomException::ERROR_TRANSACTION_NOT_FOUND, 'Transaction not found.');
        }

        switch ($transaction->state) {
            case PaycomTransaction::STATE_CANCELLED:
            case PaycomTransaction::STATE_CANCELLED_AFTER_COMPLETE:
                $this->response->send([
                    'transaction' => $transaction->paycom_transaction_id,
                    'cancel_time' => FormatHelper::datetime2timestamp($transaction->cancel_time),
                    'state' => $transaction->state,
                ]);
                break;

            case PaycomTransaction::STATE_CREATED:
                $transaction->cancel(1 * $this->request->params['reason']);

                Booking::where('id', $transaction->booking_id)->update(['paid' => null]);

                $this->response->send([
                    'transaction' => $transaction->paycom_transaction_id,
                    'cancel_time' => FormatHelper::datetime2timestamp($transaction->cancel_time),
                    'state' => $transaction->state,
                ]);
                break;

            case PaycomTransaction::STATE_COMPLETED:
                $booking = Booking::find($transaction->booking_id);
                if ($booking->canCancelPay()) {
                    // cancel and change state to cancelled
                    $transaction->cancel(1 * $this->request->params['reason']);
                    // after $transaction->cancel(), cancel_time and state properties populated with data

                    Booking::where('id', $transaction->booking_id)->update(['paid' => null]);

                    // send response
                    $this->response->send([
                        'transaction' => $transaction->paycom_transaction_id,
                        'cancel_time' => FormatHelper::datetime2timestamp($transaction->cancel_time),
                        'state' => $transaction->state,
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


    /**
     * @return bool
     * @throws PaycomException
     */
    private function validateBooking()
    {
        if (!isset($this->request->params['amount']) || !is_numeric($this->request->params['amount'])) {
            throw new PaycomException(
                $this->request->id,
                'Incorrect amount.',
                PaycomException::ERROR_INVALID_AMOUNT
            );
        }

        if (!isset($this->request->params['account']['transaction_id']) || !$this->request->params['account']['transaction_id']) {
            throw new PaycomException(
                $this->request->id,
                PaycomException::message(
                    'Неверный код заказа.',
                    'Harid kodida xatolik.',
                    'Incorrect order code.'
                ),
                PaycomException::ERROR_INVALID_ACCOUNT,
                'booking_id'
            );
        }
        $transaction = 
        $booking = Booking::find($this->request->params['account']['booking_id']);

        if (!$booking || !$booking->id) {
            throw new PaycomException(
                $this->request->id,
                PaycomException::message(
                    'Неверный код заказа.',
                    'Harid kodida xatolik.',
                    'Incorrect order code.'
                ),
                PaycomException::ERROR_INVALID_ACCOUNT,
                'booking_id'
            );
        }

        if ((100 * ($booking->price * (\App\Domain\Currencies\Models\Currency::getCurrencyRateByDate("UZS", date('Y-m-d')) ?? 1))) != (1 * $this->request->params['amount'])) {
            throw new PaycomException(
                $this->request->id,
                'Incorrect amount.',
                PaycomException::ERROR_INVALID_AMOUNT
            );
        }

        if ($booking->paid || $booking->status != Booking::STATUS_ACCEPTED || !$booking->canPay()) {
            throw new PaycomException(
                $this->request->id,
                'Order state is invalid.',
                PaycomException::ERROR_COULD_NOT_PERFORM
            );
        }

        return true;
    }


    /**
     * @throws PaycomException
     */
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

        // example implementation, that saves new password into file specified in the configuration
//        if (!file_put_contents($this->config['keyFile'], $this->request->params['password'])) {
//            $this->response->error(PaycomException::ERROR_INTERNAL_SYSTEM, 'Internal System Error.');
//        }

        // if control is here, then password is saved into data store
        // send success response
        $this->response->send(['success' => true]);
    }


    /**
     * @throws PaycomException
     */
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

        $transactions = $this->report($this->request->params['from'], $this->request->params['to']);

        // send results back
        $this->response->send(['transactions' => $transactions]);
    }

    /**
     * @throws PaycomException
     */
    private function validateTransaction()
    {
        $transaction = $this->findTransaction();
        if ($transaction && ($transaction->state == PaycomTransaction::STATE_CREATED || $transaction->state == PaycomTransaction::STATE_COMPLETED)) {
            $this->response->error(
                PaycomException::ERROR_COULD_NOT_PERFORM,
                'There is other active/completed transaction for this order.'
            );
        }
        return $transaction;
    }

    /**
     * @throws PaycomException
     */
    private function findTransaction()
    {

        if (isset($this->request->params['account'], $this->request->params['account']['booking_id'])) {
            $transaction = PaycomTransaction::where('booking_id', $this->request->params['account']['booking_id'])
                ->whereIn('state', [1, 2])->first();
        } else if (isset($this->request->params['id'])) {
            $transaction = PaycomTransaction::where('paycom_transaction_id', $this->request->params['id'])->first();
        } else {
            throw new PaycomException(
                $this->request->id,
                'Parameter to find a transaction is not specified.',
                PaycomException::ERROR_INTERNAL_SYSTEM
            );
        }
        return $transaction;
    }


    public function report($from_date, $to_date)
    {
        $from_date = FormatHelper::timestamp2datetime($from_date);
        $to_date = FormatHelper::timestamp2datetime($to_date);

        $transactions = PaycomTransaction::whereBetween('paycom_time_datetime', [$from_date, $to_date])->orderBy('paycom_time_datetime')->get();

        $result = [];
        foreach ($transactions as $row) {
            $result[] = [
                'id' => $row['paycom_transaction_id'], // paycom transaction id
                'time' => 1 * $row['paycom_time'], // paycom transaction timestamp as is
                'amount' => 1 * $row['amount'],
                'account' => [
                    'transaction_id' => 1 * $row['booking_id'], // account parameters to identify client/order/service
                    // ... additional parameters may be listed here, which are belongs to the account
                ],
                'create_time' => FormatHelper::datetime2timestamp($row['create_time']),
                'perform_time' => FormatHelper::datetime2timestamp($row['perform_time']),
                'cancel_time' => FormatHelper::datetime2timestamp($row['cancel_time']),
                'transaction' => 1 * $row['id'],
                'state' => 1 * $row['state'],
                'reason' => isset($row['reason']) ? 1 * $row['reason'] : null,
                'receivers' => isset($row['receivers']) ? json_decode($row['receivers'], true) : null,
            ];
        }

        return $result;

    }

}
