<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class WalletBalance extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','balance'];

    public static function walletBalanceUpdateOrCreate($user_id, $amount){
        $record = self::where(['user_id' => $user_id,])->latest()->first();

        if (!is_null($record)) {
            return tap($record)->update([
                'balance' => 1*$record->balance + 1*$amount
            ]);
        } else {
            return self::create([
                'user_id' => $user_id,
                'balance' => 1*$amount
            ]);
        }
    }
}
