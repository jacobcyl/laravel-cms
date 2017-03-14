<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name', 'description'];

    public function photos(){
        return $this->belongsToMany(Media::class, 'album_media', 'media_id', 'album_id')->withPivot('description');
    }
}
