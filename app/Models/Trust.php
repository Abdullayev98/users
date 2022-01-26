<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Trust extends Model
{
    use Translatable;
    use HasFactory;
    protected $translatable = [
        'title',
        'description'
    ];
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
