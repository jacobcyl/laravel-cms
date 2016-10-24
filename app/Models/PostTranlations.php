<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTranlations extends Model
{
    protected $fillable = ['title', 'content', 'author', 'digest', 'source_url'];
}
