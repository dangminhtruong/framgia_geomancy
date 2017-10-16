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

Route::get('/', function() {
    return view('welcome');
});

Route::post('auth/login', 'Auth\AuthController@login')->name('login');
Route::get('auth/logout', 'Auth\AuthController@logout')->name('logout');

Route::post('registration', 'Auth\RegistrationController@store')->name('signup');
Route::post('reset/password', 'Auth\ForgetPasswordController@requestToken')->name('forget-password');
Route::get('reset/password/{token}', 'Auth\ForgetPasswordController@resetPassword')->name('confirm-token');
Route::post('update/password', 'Auth\ForgetPasswordController@updatePassword')->name('update-password');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.product.product_form');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductController@index')->name('product-show');
        Route::post('/', 'ProductController@paginateProductByCategory');
        Route::get('create', 'ProductController@create')->name('product-create');
        Route::post('create', 'ProductController@store')->name('product-store');
    });
});

Route::group(['prefix' => 'blueprint'], function () {

    Route::group(['prefix' => 'request-fish-tanks-blueprint'], function () {
        Route::get('/', 'BlueprintController@getRequestFishTanksBlueprint')
            ->name('GetRequestFishTanksBlueprint');
        Route::post('/', 'BlueprintController@postRequestFishTanksBlueprint')
            ->name('postRequestFishTanksBlueprint');
    });

    Route::group(['prefix' => 'create-blueprint'], function () {
        Route::get('/', 'BlueprintController@getCreateBlueprint')->name('getCreateBlueprint');
        Route::post('/', 'BlueprintController@postCreateBlueprint')->name('postCreateBlueprint');
    });

    Route::group(['prefix' => 'search-product'], function() {
        Route::get('/', 'ProductController@getSearchProduct')->name('getSearchProduct');
    });
});
