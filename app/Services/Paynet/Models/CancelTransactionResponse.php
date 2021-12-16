<?php
namespace App\Services\Paynet\Models;

class CancelTransactionResponse extends GenericResponse
{
    /**
     * @access public
     * @var integer
     */
    public $transactionState;
}