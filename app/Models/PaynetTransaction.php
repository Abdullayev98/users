<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaynetTransaction extends Model
{
    use HasFactory;
    protected $table = 'paynet_transactions';
    protected $fillable = [
        'user_id',
        'amount', // double (10,2)
        'status'
    ];



}
