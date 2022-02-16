<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Task extends Model
{
    use HasFactory;
    use Translatable;

    const STATUS_NEW = 0;
    const STATUS_OPEN = 1;
    const STATUS_RESPONSE = 2;
    const STATUS_IN_PROGRESS = 3;
    const STATUS_COMPLETE = 4;
    const STATUS_COMPLETE_WITHOUT_REVIEWS = 5;

    protected $guarded  = [];

    protected $withCount = ['responses','reviews'];

    public function custom_field_values(){
        return $this->hasMany(CustomFieldsValue::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function performer(){
        return $this->belongsTo(User::class,'performer_id');
    }


    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function responses(){
        return $this->hasMany(TaskResponse::class);
    }


    public function getPriceAttribute(){
        return preg_replace('/[^0-9.]+/', '', $this->budget);
    }
}
