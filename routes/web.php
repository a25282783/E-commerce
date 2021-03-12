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
Route::get('/test', 'HomeController@sandbox');

Auth::routes(['verify' => true]);

// ========== guest ==========
Route::get('/', 'HomeController@index')->name('home');
Route::get('/company', 'HomeController@company')->name('about');

// ========== auth ===========
Route::group(['middleware' => ['verified', 'auth']], function () {

});
