<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Task extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable = ['name', 'address', 'category_id', 'date_type', 'start_date', 'end_date', 'budget', 'description', 'phone'];
    protected $translatable = [
        'name',
        'address',
        'descrtions',
        'description_private',
    ];
}
