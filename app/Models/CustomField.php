<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CustomField extends Model
{
    use HasFactory;
    use Translatable;

    protected $casts = [
        'options' => 'array'
    ];
    protected $translatable = ['title','description','placeholder','label'];


    const ROUTE_NAME = 'name';
    const ROUTE_ADDRESS = 'address';
    const ROUTE_CUSTOM = 'custom';
    const ROUTE_DATE = 'date';
    const ROUTE_NOTE = 'note';
    const ROUTE_BUDGET = 'budget';
    const ROUTE_CONTACTS = 'contacts';



    public function custom_field_values(){
        return $this->hasMany(CustomFieldsValue::class);
    }
}
