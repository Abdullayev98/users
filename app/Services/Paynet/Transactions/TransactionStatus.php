<?php
namespace App\Services\Paynet\Transactions;

class TransactionStatus
{
    /**
     * 1 если оплачено
     */
    const PAID = 1;
    /**
     * 2 если отменено
     */
    const CANCELLED = 2;
}