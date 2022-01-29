<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio_new extends Model
{
    use HasFactory;
    protected $table = 'portfolios';
    protected $fillable =['image','comment_id'];
}
