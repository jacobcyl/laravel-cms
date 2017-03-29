<?php

namespace App\Models;

use App\Support\TranslateAuthor;
use Illuminate\Database\Eloquent\Model;

class PostTranslations extends Model
{
    use TranslateAuthor;

    protected $fillable = ['post_id', 'locale', 'title', 'content', 'author', 'digest', 'source_url'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
