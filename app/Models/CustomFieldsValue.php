<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CustomFieldsValue extends Model
{


    public function custom_field(){
    return $this->belongsTo(CustomField::class);

    }

}
