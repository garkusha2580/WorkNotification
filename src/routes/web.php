<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix("admin")->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home', "HomeController@add")->name("addSite");
    Route::resource("/notification", "NotificationController");
});

Route::get("mail", function () {
    return new \App\Mail\NotificationMail(\App\Models\Data::first()->toArray());
});

