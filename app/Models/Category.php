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

    protected $table = "categories";

    public function tasks()
    {
        return $this->hasMany(Task::class);

    }


    public function custom_fields(){
        return $this->hasMany(CustomField::class);
    }


}
