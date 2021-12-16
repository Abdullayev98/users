<?php
namespace App\Services\Paynet\Models;

class CheckTransactionRequest extends GenericRequest
{
    /**
     * @access public
     * @var integer
     */
    public $transactionId;

    /**
     * @access public
     * @var string
     */
    public $transactionTime;
}