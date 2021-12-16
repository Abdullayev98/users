<?php
namespace App\Services\Paynet\Models;

use DateTime;

class GetStatementRequest extends GenericRequest
{
    /**
     * @access public
     * @var dateTime
     */
    public $dateFrom;
    /**
     * @access public
     * @var dateTime
     */
    public $dateTo;
    /**
     * @access public
     * @var integer
     */
    public $serviceId;
    public $onlyTransactionId;
}