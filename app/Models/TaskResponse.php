<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskResponse extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'task_id', 'description', 'notificate', 'time', 'price','creator_id'];


    protected $with = ['user', 'task'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
