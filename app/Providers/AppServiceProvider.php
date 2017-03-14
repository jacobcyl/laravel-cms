<?php

namespace App\Providers;

use App\Services\FileUpload;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
            //dump($event->sql);
            //dump($event->bindings);
            if(env('APP_DB_LOG', false)) {
                Log::info('['.$query->connectionName.'-SQL] ' . $query->sql . " with " . join(',', $query->bindings));
            }
        });
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
