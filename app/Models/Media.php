<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'user_id',
        'category',
        'storage',
        'path',
        'origin_name',
        'file_name',
        'mimetype',
        'file_type',
        'file_size'
    ];
}
