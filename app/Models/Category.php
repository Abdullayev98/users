<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
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

    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function childs(){
        return $this->hasMany(Category::class,'parent_id','id');
    }


}
