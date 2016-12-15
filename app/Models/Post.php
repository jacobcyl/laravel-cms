<?php

namespace App\Models;

use App\Support\Translateable;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{
    use Translatable;
    //use Translateable;


    public $translationModel = PostTranlations::class;

    public $translatedAttributes = ['title', 'content', 'author', 'digest'];
    protected $fillable = ['published'];


    /**
     * Columns that are file.
     *
     * @var array
     */
    public $attachments = [
        'image' => 'cover_id',
    ];
    
    public function categories(){
        return $this->belongsToMany(Category::class, 'post_category');
    }

    // translate
    // see http://blog.remoblaser.ch/laravel/2016/laravel-multi-language/
    //Read the title in the currently set language
    //$post->translation()->first()->title;
    //
    //Read the title in the language "de"
    //$post->translation('de')->first()->title;
    //
    //Update a post
    //$post->translation()->first()->update([]);
    /*public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany(PostTranlations::class)->where('language', '=', $language);
    }*/
}
