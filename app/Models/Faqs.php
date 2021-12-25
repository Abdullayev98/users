<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Faqs extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['question','q_descript', 'answer_text'];

}
