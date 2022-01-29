<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Portfoliocomment extends Model
{
    use HasFactory;
    protected $fillable =['description','user_id'];
    protected $translatable = [
        'description'
    ];
}
