<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @property $user_id
 * @property $amount
 * @property $status
 */
class ClickTransaction extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'click_transactions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'amount',
        'status'
    ];

    /**
     * @var array
     */
    protected $hidden = [];

    /**
     * @var string[]
     */
    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
