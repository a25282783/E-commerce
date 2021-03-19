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
Route::get('/service', 'HomeController@service')->name('service');
Route::get('/technology', 'HomeController@technology')->name('tech');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/download', 'HomeController@download')->name('download');
Route::get('/contact_us', 'HomeController@contact')->name('contact');
Route::post('/contact_us', 'HomeController@contactPost')->name('post.contact');
Route::get('/product/{id}', 'CartController@product')->where('id', '[0-9]+');
Route::get('/category/{id}', 'CartController@category')->where('id', '[0-9]+');

// ========= upload ==========
Route::post('ckeditor/upload', 'CkeditorUploadController@uploadImage');
// ========== auth ===========
Route::group(['middleware' => ['verified', 'auth']], function () {
    Route::get('profile', 'HomeController@profile')->name('user');
    Route::post('profile', 'HomeController@update_profile')->name('update.user');
    Route::post('addToCart', 'CartController@addToCart');
    Route::post('dropToCart', 'CartController@dropToCart');
    Route::get('cart', 'CartController@cart');
});
