<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Reklama extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = [
        'title',
        'comment',
        'image',
    ];
    protected $fillable = [
        'title',
        'comment',
        'image',
    ];
}
