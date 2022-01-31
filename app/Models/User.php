<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use App\Models\Message;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function appeals(){
        return $this->hasMany(Message::class);
    }
    public function Socials(){
        return $this->hasMany(Social::class);
    }
    public function scopeUpdateViews($query, $id) {
        return $query->whereId($id)->increment('views', 1);
    }
    public function reviews() {
        return $this->hasMany(Review::class);
    }


    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function views(){
        return $this->hasMany(UserView::class,'performer_id');
    }
}
