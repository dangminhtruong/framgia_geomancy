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
})->name('home');
Route::post('auth/login', 'Auth\AuthController@login')->name('login');
Route::get('auth/logout', 'Auth\AuthController@logout')->name('logout');
Route::post('registration', 'Auth\RegistrationController@store')
    ->name('signup');
Route::post('reset/password', 'Auth\ForgetPasswordController@requestToken')
    ->name('forget-password');
Route::get('reset/password/{token}', 'Auth\ForgetPasswordController@resetPassword')
    ->name('confirm-token');
Route::post('update/password', 'Auth\ForgetPasswordController@updatePassword')
    ->name('update-password');
Route::get('request-fish-tanks-blueprint', 'BlueprintController@getRequestFishTanksBlueprint')
    ->name('getRequestFishTanksBlueprint');
Route::post('request-fish-tanks-blueprint', 'BlueprintController@postRequestFishTanksBlueprint')
    ->name('postRequestFishTanksBlueprint');
Route::get('create-blueprint', 'BlueprintController@getCreateBlueprint')
    ->name('getCreateBlueprint');
Route::post('create-blueprint', 'BlueprintController@postCreateBlueprint')
    ->name('postCreateBlueprint');

