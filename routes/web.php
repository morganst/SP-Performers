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
});

Route::get('/students', function () {
    return view('students/index');
});

Auth::routes();

Route::get('/', [
    'middleware' => 'auth',
    'uses' => 'HomeController@index'
]);
Route::get('/students', [
    'middleware' => 'auth',
    'uses' => 'HomeController@index'
]);