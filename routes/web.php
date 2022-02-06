<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return redirect('/');
});

Auth::routes();

Route::get('/delete-message/{req_id}', 'App\Http\Controllers\HomeController@delete_message');
Route::get('/update-message/{req_id}', 'App\Http\Controllers\HomeController@edit');

Route::post('/commit-message', 'App\Http\Controllers\HomeController@update_message');
Route::post('/create-message', 'App\Http\Controllers\HomeController@create_message');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
