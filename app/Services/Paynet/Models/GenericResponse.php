<?php
namespace App\Services\Paynet\Models;

use DateTime;

class GenericResponse
{
    /**
     * @access public
     * @var string
     */
    public $errorMsg;
    /**
     * @access public
     * @var integer
     */
    public $status;
    /**
     * @access public
     * @var dateTime
     */
    public $timeStamp;
}
