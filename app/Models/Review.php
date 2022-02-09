<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = ['user_id','description','good_bad','reviewer_id','task_id'];
    public function user()
    {
        return $this->belongsTo(User::class,'reviewer_id');
    }
    public function reviewer()
    {
        return $this->hasOne(User::class);
    }
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
