<?php
namespace App\Support;
use Illuminate\Support\Facades\Config;

trait SetupOrder
{
    protected static function boot()
    {
        parent::boot();

        static::created(function($model){
            $model->order = $model->id;
            $model->save();
        });
    }
}