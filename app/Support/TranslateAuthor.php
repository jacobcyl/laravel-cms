<?php
namespace App\Support;
use Illuminate\Support\Facades\Config;

trait TranslateAuthor
{
    protected static function boot()
    {
        parent::boot();

        static::created(function($model){
            $currenUser = auth()->user() ;
            $model->user_id = $currenUser->id;
            if(empty($model->author)) $model->author = $currenUser->name;
            $model->save();
        });
    }
}