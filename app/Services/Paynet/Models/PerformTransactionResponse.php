<?php
namespace App\Services\Paynet\Models;

class PerformTransactionResponse extends GenericResponse
{
    /**
     * @access public
     * @var integer
     */
    public $providerTrnId;
}