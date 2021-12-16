<?php
namespace App\Services\Paynet\Models;

use DateTime;

class PerformTransactionRequest extends GenericRequest
{
    /**
     * @access public
     * @var integer
     */
    public $amount;
    /**
     * Идентификатор транзакции клиента
     * @access public
     * @var integer
     */
    public $transactionId;
    /**
     * Дата и время транзакции
     * @access public
     * @var dateTime
     */
    public $transactionTime;
}