<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class FaqCategories extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['title','description', 'cat_author'];

    protected $with = ['faqs'];

    public function faqs(){
        return $this->hasMany(Faqs::class,'category_id');
    }

}
