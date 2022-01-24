<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    use HasFactory;

    const STATUS_OPEN = 0;
    const STATUS_IN_PROGRESS = 1;
    const STATUS_COMPLETE = 2;


    protected $guarded  = [];


    public function custom_field_values(){
        return $this->belongsTo(CustomFieldsValue::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }



}
