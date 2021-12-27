<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class All_transaction extends Model
{
    use HasFactory;
    const DRIVER_PAYME = 'Payme';
    /** Pay in progress, order must not be changed. */
    const STATE_WAITING_PAY  = 1;
    /** Transaction completed and not available for sell. */
    const STATE_PAY_ACCEPTED = 2;
    /** Transaction is cancelled. */
    const STATE_CANCELLED    = 3;
    /** Transaction status is new. */
    const STATUS_NEW         = 0;
    /** Transaction status is paid success. */
    const STATUS_SUCCESS     = 1;
    /** Transaction status is rejected. */
    const STATUS_REJECTED    = -1;

    protected $fillable = ['user_id','amount','method'];
}
