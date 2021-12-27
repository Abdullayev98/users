<?php
namespace App\Services\Payme;

use App\Services\Payme\PaycomException;
use mysql_xdevapi\Exception;

class AllTransaction extends Database
{
    /** Transaction is available for sell, anyone can buy it. */
    const STATE_AVAILABLE = 0;

    /** Pay in progress, order must not be changed. */
    const STATE_WAITING_PAY = 1;

    /** Transaction completed and not available for sell. */
    const STATE_PAY_ACCEPTED = 2;

    /** Transaction is cancelled. */
    const STATE_CANCELLED = 3;

    const STATUS_NEW         = 0;
    /** Transaction status is paid success. */
    
    const STATUS_SUCCESS     = 1;
    /** Transaction status is rejected. */
    
    const STATUS_REJECTED    = -1;
    
    public $request_id;
    public $params;

    // todo: Adjust Order specific fields for your needs

    /**
     * AllTransaction ID
     */
    public $id;

    /**
     * Total price of the selected products/services
     */
    public $amount;

    /**
     * State of the transaction
     */
    public $state;

    /**
     * Status of the transaction
     */
    public $status;

    /**
     * Type of the payment driver
     */
    public $method;

    public function __construct($request_id)
    {
        $this->request_id = $request_id;
    }

    /**
     * Validates amount and account values.
     * @param array $params amount and account parameters to validate.
     * @return bool true - if validation passes
     * @throws PaycomException - if validation fails
     */
    public function validate(array $params)
    {
        // todo: Validate amount, if failed throw error
        // for example, check amount is numeric
        if (!is_numeric($params['amount'])) {
            throw new PaycomException(
                $this->request_id,
                'Incorrect amount.',
                PaycomException::ERROR_INVALID_AMOUNT
            );
        }

        // todo: Validate account, if failed throw error
        // assume, we should have order_id
        if (!isset($params['account']['transaction_id']) || !$params['account']['transaction_id']) {
            throw new PaycomException(
                $this->request_id,
                PaycomException::message(
                    'Неверный код заказа.',
                    'Harid kodida xatolik.',
                    'Incorrect order code.'
                ),
                PaycomException::ERROR_INVALID_ACCOUNT,
                'transaction_id'
            );
        }

        // todo: Check is order available

        // assume, after find() $this will be populated with Order data
        $order = $this->find($params['account']);

        // Check, is order found by specified order_id
        if (!$order || !$order->id) {
            throw new PaycomException(
                $this->request_id,
                PaycomException::message(
                    'Неверный код заказа.',
                    'Harid kodida xatolik.',
                    'Incorrect order code.'
                ),
                PaycomException::ERROR_INVALID_ACCOUNT,
                'transaction_id'
            );
        }

        // validate amount
        // convert $this->amount to coins
        // $params['amount'] already in coins
        if ((100 * $this->amount) != (1 * $params['amount'])) {
            throw new PaycomException(
                $this->request_id,
                'Incorrect amount.',
                PaycomException::ERROR_INVALID_AMOUNT
            );
        }

        // for example, order state before payment should be 'waiting pay'
        if ($this->state != self::STATE_WAITING_PAY) {
            throw new PaycomException(
                $this->request_id,
                'User transaction state is invalid.',
                PaycomException::ERROR_COULD_NOT_PERFORM
            );
        }

        // keep params for further use
        $this->params = $params;

        return true;
    }

    /**
     * Find order by given parameters.
     * @param mixed $params parameters.
     * @return AllTransaction|AllTransaction[] found transaction or array of transactions.
     */
    public function find($params)
    {
        // todo: Implement searching order(s) by given parameters, populate current instance with data

        // Example implementation to load order by id
        if (isset($params['transaction_id'])) {
            $sql        = "select * from all_transactions where id=:transactionId";
            $sth        = self::db()->prepare($sql);
            $is_success = $sth->execute([':transactionId' => $params['transaction_id']]);

            if ($is_success) {

                $row = $sth->fetch();

                if ($row) {
                    $this->id          = 1 * $row['id'];
                    $this->amount      = 1 * $row['amount'];
                    $this->state       = 1 * $row['state'];
                    return $this;
                }

            }

        }

        return null;
    }

    /**
     * Change transaction's state to specified one.
     * @param int $state new state of the transaction
     * @return void
     */
    public function changeState($state)
    {
        // todo: Implement changing transaction state (reserve order after create transaction or free transaction after cancel)

        // Example implementation
        $this->state = 1 * $state;
        $this->save();
    }

    /**
     * Change transaction's status to specified one.
     * @param int $status new state of the transaction
     * @return void
     */
    public function changeStatus($status)
    {
        $this->status = 1 * $status;
        $this->save();
    }

    /**
     * Check, whether transaction can be cancelled or not.
     * @return bool true - transaction is cancellable, otherwise false.
     */
    public function allowCancel()
    {
        // todo: Implement transaction cancelling allowance check

        // Example implementation
        return true; // do not allow cancellation
    }

    /**
     * Saves this transaction.
     * @throws PaycomException
     */
    public function save()
    {
        $db = self::db();

        if (!$this->id) {
            // If new transaction, set its state to waiting
            $this->state = self::STATE_WAITING_PAY;

            // todo: Set customer ID
            // $this->user_id = 1 * SomeSessionManager::get('user_id');

            $sql        = "insert into all_transactions set amount = :pAmount, status = :pStatus, state = :pState, user_id = :pUserId, method = :pMethod";
            $sth        = $db->prepare($sql);
            $is_success = $sth->execute([
                ':pAmount'  => $this->amount,
                ':pStatus'  => $this->status,
                ':pState'   => $this->state,
                ':pUserId'  => $this->user_id,
                ':pMethod'  => $this->method,
            ]);

            if ($is_success) {
                $this->id = $db->lastInsertId();
            }
        } else {

            $sql        = "update all_transactions set state = :pState where id = :pId";
            $sth        = $db->prepare($sql);
            $is_success = $sth->execute([':pState' => $this->state, ':pId' => $this->id]);

        }

        if (!$is_success) {
            // throw new PaycomException($this->request_id, json_encode($is_success), PaycomException::ERROR_INTERNAL_SYSTEM);
            throw new PaycomException($this->request_id, 'Could not save transaction.', PaycomException::ERROR_INTERNAL_SYSTEM);
        }
    }
}