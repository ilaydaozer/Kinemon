<?php

use Illuminate\Support\Facades\Route;
//siz hiç yüklediniz mi bir paket ?
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/email/verify', 'App\Http\Controllers\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'App\Http\Controllers\VerificationController@verify')->name('verification.verify');
Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['verified']], function() {
        Route::get('/', 'App\Http\Controllers\EventController@index');

        Route::get('/profile', 'App\Http\Controllers\ProfileController@edit');
        Route::post('/profile', 'App\Http\Controllers\ProfileController@update');
        Route::get('/profile/password', 'App\Http\Controllers\ProfileController@password');
        Route::post('/profile/password', 'App\Http\Controllers\ProfileController@updatePassword');

        Route::get('/event/detail/{event}', 'App\Http\Controllers\EventController@detail');
        Route::get('/event/accept/{event}', 'App\Http\Controllers\EventController@accept');
        Route::get('/event/reject/{event}', 'App\Http\Controllers\EventController@reject');
        Route::get('/event/create', 'App\Http\Controllers\EventController@create');
        Route::post('/event/create', 'App\Http\Controllers\EventController@store');

        Route::get('/friends', 'App\Http\Controllers\FriendController@friend');
        Route::get('/friends/{user}', 'App\Http\Controllers\FriendController@detail');
        Route::get('/friends/{user}/add', 'App\Http\Controllers\FriendController@add');
        Route::get('/friends/{user}/remove', 'App\Http\Controllers\FriendController@remove');

        Route::get('/settings', 'App\Http\Controllers\SettingsController@settings');

        Route::get('/notifications', 'App\Http\Controllers\NotificationController@notifications');
        Route::get('/scraper','App\Http\Controllers\ScraperController@index');

        //terminali açare mısın

    });
});


require __DIR__.'/auth.php';
