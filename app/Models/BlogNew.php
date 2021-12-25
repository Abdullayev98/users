<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use TCG\Voyager\Traits\Translatable;

class BlogNew extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Translatable;
    protected $table = "blog_new";

    protected $translatable = ['title','text'];
}
