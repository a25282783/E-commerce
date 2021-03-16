<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('company', CompanyController::class);
    $router->resource('faq', FaqController::class);
    $router->resource('service', ServiceController::class);
    $router->resource('tech', TechController::class);
    $router->resource('contact', ContactController::class);
    $router->resource('message', MessageController::class);
    $router->resource('file', FileController::class);
    $router->resource('category', CategoryController::class);
    $router->resource('product', ProductController::class);
    $router->resource('cart', CartController::class);
});
