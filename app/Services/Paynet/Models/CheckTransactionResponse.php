<?php
namespace App\Services\Paynet\Models;

class CheckTransactionResponse extends GenericResponse
{
    /**
     * @access public
     * @var integer
     */
    public $providerTrnId;
    /**
     * @access public
     * @var integer
     */
    public $transactionState;
    public $transactionStateErrorStatus;
    public $transactionStateErrorMsg;
}