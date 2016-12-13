<?php

namespace App\Providers;

use App\Services\FileUpload;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
        |--------------------------------------------------------------------------
        | upload service.
        |--------------------------------------------------------------------------
        */
        $this->app->singleton('upload.file', function () {
            return new FileUpload();
        });
    }
}
