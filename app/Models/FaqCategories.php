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
}
