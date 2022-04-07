<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $amount
 * @property int $order_id
 * @property int $service_id
 */
class UserExpense extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_expenses';

    /**
     * @var array <string, string>
     */
    protected $fillable = [
        'user_id',
        'amount',
        'order_id',
        'service_id'
    ];

    /**
     * @var array <string>
     */
    protected $hidden = [];

    /**
     * @var array <string, string>
     */
    protected $casts = [];

}
