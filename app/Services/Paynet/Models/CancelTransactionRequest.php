<?php
namespace App\Services\Paynet\Models;

use DateTime;

class CancelTransactionRequest extends GenericRequest
{
    /**
     * @access public
     * @var integer
     */
    public $serviceId;
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
}