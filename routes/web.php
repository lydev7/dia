<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'password.confirm'])->group(function (){
    Route::get('params','UserController@params')->name('params');

    Route::post('params', 'UserController@paramsUpdate')->name('params.update');
});

Route::middleware(['auth', 'password.confirm', 'admin'])->group(function (){
    // Users
    Route::resource('user','UserController')->only(['index', 'show']);
    // Attributes
    Route::resource('attribute','AttributeController')->only(['index', 'store', 'destroy']);


});
// list
// create
// update
// Delete
// pusher
Route::resource('message','SignalController')->except(['create', 'show']);

// premium

