<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class All_transaction extends Model
{
    use HasFactory;

    const STATUS_MODERATING  = 'moderating';
    const STATUS_PROCEED     = 'proceed';
    const STATUS_REJECTED    = 'rejected';
    const STATUS_ACCEPTED    = 'accepted';

    const PAID_CASH          = 'cash';
    const PAID_UZCARD        = 'uzcard';
    const PAID_TRANSFER      = 'transfer';
    const PAID_VISA          = 'visa';
    const PAID_MCARD         = 'mcard';

    protected $fillable = ['user_id','amount','method'];
}
