<?php

use App\Admin\Controllers\UserController;
use Illuminate\Routing\Router;
use App\Admin\Controllers\PostCategoryController;
use App\Admin\Controllers\PostController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('/users', UserController::class);
    $router->resource('/post-categories', PostCategoryController::class);
    $router->resource('/posts', PostController::class);


});
