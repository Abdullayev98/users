<?php
namespace App\Services\Paynet\Models;

class GetStatementResponse extends GenericResponse
{
    /**
     * @access public
     * @var TransactionStatement[]
     */
    public $statements;
}