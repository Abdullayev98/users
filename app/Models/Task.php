<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Task extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable = ['user_id' ,
        'name', 'address',
        'category_id', 'date_type', 'start_date',
        'end_date', 'budget', 'description', 'phone','user_name',
        'user_email','need_movers', 'etaj_po',
        'lift_po',
        'etaj_za',
        'lift_za',
        'peopleCount',
        'weight',
        'length',
        'width',
        'height',
];
    protected $translatable = [
        'name',
        'address',
        'descrtions',
        'description_private',
    ];
}
