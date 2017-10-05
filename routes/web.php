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
Route::post('dang-nhap', 'Auth\AuthController@login')->name('login');
Route::get('dang-xuat', 'Auth\AuthController@logout')->name('logout');
Route::get('request-fish-tanks-blueprint', 'BlueprintController@getRequestFishTanksBlueprint')
    ->name('getRequestFishTanksBlueprint');
Route::post('request-fish-tanks-blueprint', 'BlueprintController@postRequestFishTanksBlueprint')
    ->name('postRequestFishTanksBlueprint');
