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

Route::get('/', 'HomeController@index')->name('home');

Route::post('auth/login', 'Auth\AuthController@login')->name('login');
Route::get('auth/logout', 'Auth\AuthController@logout')->name('logout');

Route::group(['prefix' => 'user'], function () {
    Route::get('{userId}/profile', 'UserController@viewProfile')->name('other-profile');
    Route::middleware(['customer.auth'])->group(function () {
        Route::get('profile', 'UserController@index')->name('profile');
        Route::post('profile', 'UserController@save')->name('profile-update');
    });
});


Route::post('registration', 'Auth\RegistrationController@store')->name('signup');
Route::post('reset/password', 'Auth\ForgetPasswordController@requestToken')->name('forget-password');
Route::get('reset/password/{token}', 'Auth\ForgetPasswordController@resetPassword')->name('confirm-token');
Route::post('update/password', 'Auth\ForgetPasswordController@updatePassword')->name('update-password');

Route::group(['prefix' => 'admin', 'middleware' => 'admin.auth'], function () {
    Route::get('/', function () {
        return view('admin.product.product_form');
    })->name('admin');

    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductController@index')->name('product-show');
        Route::post('/', 'ProductController@paginateProductByCategory');
        Route::get('create', 'ProductController@create')->name('product-create');
        Route::post('create', 'ProductController@store')->name('product-store');
        Route::post('delete', 'ProductController@delete')->name('product-delete');
        Route::get('update/{productId}', 'ProductController@update')->name('product-update');
        Route::post('update', 'ProductController@save')->name('product-save');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', 'CategoryController@index')->name('category-show');
        Route::post('/', 'CategoryController@paginateCategory');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', 'UserController@showUserList')->name('user-show');
        Route::post('/', 'UserController@paginateUser');
        Route::post('lock', 'UserController@lockAccount');
        Route::post('unlock', 'UserController@unlockAccount');
        Route::get('/search', 'UserController@search')->name('user-search');
    });

    Route::prefix('request')->group(function () {
        Route::get('/{type}', 'RequestManagerController@index')->name('request-blueprint');
        Route::post('/', 'RequestManagerController@viewRequestBlueprint');
        Route::get('/detail/{requestId}', 'RequestManagerController@viewRequestDetail')->name('request-detail');
        Route::post('approve', 'RequestManagerController@approve')->name('request-approve');
    });
});

Route::group(['prefix' => 'blueprint', 'middleware' => 'check.signed'], function () {

    Route::group(['prefix' => 'request-blueprint'], function () {
        Route::get('/', 'BlueprintController@getRequestFishTanksBlueprint')
            ->name('getRequestFishTanksBlueprint');
        Route::post('/', 'BlueprintController@postRequestFishTanksBlueprint')
            ->name('postRequestFishTanksBlueprint');
        Route::group(['prefix' => 'edit'], function () {
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/', 'BlueprintController@getEditRequest')->name('getEditRequest');
                Route::post('/', 'BlueprintController@postEditRequest')->name('postEditRequest');
            });
        });
        Route::get('delete/{id}', 'BlueprintController@deleteRequest')->name('deleteRequest');
    });

    Route::group(['prefix' => 'create-blueprint'], function () {
        Route::get('/', 'BlueprintController@getCreateBlueprint')->name('getCreateBlueprint');
        Route::post('/', 'BlueprintController@postCreateBlueprint')->name('postCreateBlueprint');
        Route::get('add-attribute/{id}', 'BlueprintController@getAddAttribute')->name('getAddAttribute');
    });

    Route::group(['prefix' => 'search-product'], function () {
        Route::get('/', 'ProductController@getSearchProduct')->name('getSearchProduct');
        Route::get('/{id}', 'ProductController@searchProductById')->name('searchProductById');
    });

    Route::get('suggest-product', 'SuggestProductController@suggetProduct')->name('suggetProduct');

    Route::group(['prefix' => 'create-success'], function () {
        Route::get('/{id}', 'BlueprintController@getCreateDone')->name('getCreateDone');
    });

    Route::group(['prefix' => 'update-blueprint'], function () {
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', 'BlueprintController@getUpdateBlueprint')->name('getUpdateBlueprint');
            Route::post('/', 'BlueprintController@postUpdateBlueprint')->name('postUpdateBlueprint');
        });
        Route::get("remove-gallery/{id}", "BlueprintController@getRemoveGallery")->name('getRemoveGallery');
    });

    Route::get('delete-blueprint/{id}', 'BlueprintController@deleteBlueprint')->name('deleteBlueprint');

    Route::get('view-blueprint/{id}', 'BlueprintController@getViewBlueprint')->name('getViewBlueprint');
    Route::get('list-blueprint', 'BlueprintController@listBlueprint')->name('listBlueprint');
    Route::get('list-new-blueprint', 'BlueprintController@listNewBlueprint')->name('listNewBlueprint');
});

Route::group(['prefix' => 'post'], function () {
    Route::group(['prefix' => 'write'], function () {
        Route::get('/', 'PostController@writePost')->name('writePost');
        Route::post('/', 'PostController@postWritePost')->name('postWritePost');
    });
});

Route::get('list-by-category/{id}', 'CategoryController@listProductByCategory')->name('listProductByCategory');