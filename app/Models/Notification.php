<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Notification extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['description'];
    protected $fillable = ['user_id','service_id','task_id','cat_id','description','name_task','type'];

}
