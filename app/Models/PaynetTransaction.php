<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $transactionable_id
 * @property double $amount
 * @property int $status
 */
class PaynetTransaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'transactionable_id',
        'amount', // double (10,2)
        'status'
    ];



}
