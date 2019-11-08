<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api']], function(){
    Route::apiResource('/posts', 'Api\PostController')
        ->only(['index', 'show']);
    Route::apiResource('/comments', 'Api\CommentController')
        ->only(['index', 'show']);

    Route::post('register', 'JWTAuthController@register')
        ->name('api.jwt.register');
    Route::post('login', 'JWTAuthController@login')
        ->name('api.jwt.login');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('/posts', 'Api\PostController')
        ->only(['create']);
    Route::apiResource('/comments', 'Api\CommentController')
        ->only(['create']);

    Route::get('user', 'JWTAuthController@user')
        ->name('api.jwt.user');
    Route::post('logout', 'JWTAuthController@logout')
        ->name('api.jwt.logout');
});