<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name', 'description', 'cover_id'];

    public function photos(){
        return $this->belongsToMany(Media::class, 'album_media')->orderBy('id', 'desc')->withPivot('description');
    }

    public function cover(){
        return $this->hasOne(Media::class, 'id', 'cover_id');
    }
}
