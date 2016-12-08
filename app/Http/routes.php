<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::auth();

Route::post('contact', 'HomeController@postContact');

Route::group(['prefix'=>LaravelLocalization::setLocale()], function(){
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware'=>['web','auth'], 'prefix' => LaravelLocalization::setLocale().'/dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard.'], function (){
    Route::get('/', [
        'as'   => 'index',
        'uses' => 'DashboardController@showDashboard',
    ]);

    Route::group(['prefix'=>'/article'], function(){
        Route::get('/', 'PostController@index')->name('post-list');
        Route::get('/create', 'PostController@create');
        Route::post('/store', 'PostController@store')->name('store-post');
    });
    
    Route::group(['prefix'=>'/page'], function (){
        Route::get('/', 'PageController@index');
        Route::get('/create', 'PageController@create');
    });

    Route::group(['prefix' => '/category'], function(){
        Route::get('/', 'CategoryController@index');
    });
});