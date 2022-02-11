<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['name'];

    protected $table = "categories";
    protected $withCount = ['tasks'];

    public function tasks()
    {
        return $this->hasMany(Task::class);

    }


    public function custom_fields(){
        return $this->hasMany(CustomField::class);
    }

    public function customFieldsInName(){
        return $this->hasMany(CustomField::class)->where('route', CustomField::ROUTE_NAME);
    }
    public function customFieldsInAddress(){
        return $this->hasMany(CustomField::class)->where('route', CustomField::ROUTE_ADDRESS);
    }
    public function customFieldsInBudget(){
        return $this->hasMany(CustomField::class)->where('route', CustomField::ROUTE_BUDGET);
    }
    public function customFieldsInNote(){
        return $this->hasMany(CustomField::class)->where('route', CustomField::ROUTE_NOTE);
    }
    public function customFieldsInContacts(){
        return $this->hasMany(CustomField::class)->where('route', CustomField::ROUTE_CONTACTS);
    }
    public function customFieldsInCustom(){
        return $this->hasMany(CustomField::class)->where('route', CustomField::ROUTE_CUSTOM);
    }
    public function customFieldsInDate(){
        return $this->hasMany(CustomField::class)->where('route', CustomField::ROUTE_DATE);
    }
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function childs(){
        return $this->hasMany(Category::class,'parent_id','id');
    }


}
