<?php
namespace App\Services\Paynet\Models;

use DateTime;

class TransactionStatement
{
    /**
     * @access public
     * @var integer
     */
    public $amount;
    /**
     * @access public
     * @var integer
     */
    public $providerTrnId;
    /**
     * @access public
     * @var integer
     */
    public $transactionId;
    /**
     * @access public
     * @var dateTime
     */
    public $transactionTime;

    public function __construct($amount, $providerTrnId, $transactionId, $transactionTime)
    {
        $this->amount = $amount;
        $this->providerTrnId = $providerTrnId;
        $this->transactionId = $transactionId;
        $this->transactionTime = $transactionTime;
    }
}