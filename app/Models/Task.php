<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Task extends Model
{
    use HasFactory;
    use Translatable;

    const STATUS_OPEN = 0;
    const STATUS_IN_PROGRESS = 1;
    const STATUS_COMPLETE = 2;


    protected $guarded  = [];

    protected $translatable = [
        'name',
        'address',
        'descrtions',
        'description_private',
    ];


    public function custom_field_values(){
        return $this->belongsTo(CustomFieldsValue::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }



}
