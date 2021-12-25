<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class All_transaction extends Model
{
    use HasFactory;

    const STATUS_NEW           = '0';
    const STATUS_PAID_SUCCESS = '1';
    const STATUS_PAID_REJECTED = '2';

    protected $fillable = ['user_id','amount','method'];
}
