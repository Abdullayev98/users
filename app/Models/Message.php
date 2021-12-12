<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $table = "messages";
    protected $fillable = [
        'status'
    ];
    public function userObject()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function actionObject()
    {
        return $this->belongsTo(Action::class, 'type', 'id');
    }
    // protected $fillable = ["messages"];
    public function scopeCurrentUser($query)
    {
        // return Auth::user()->hasRole('admin') ? $query : (Auth::user()->hasRole('moderator') ? $query->where('responsible', Auth::user()->id) : $query->where('user_id', Auth::user()->id));
        return (Auth::user()->hasRole('admin') || Auth::user()->hasRole('moderator')) ? $query : ((Auth::user()->hasRole('expert')) ? $query->whereIn() :  ($query->where('user_id', Auth::user()->id)));
    }
}
