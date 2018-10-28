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

Route::get('/unauthorized', function () {
    return view('unauthorized');
});

Route::resource('students', 'StudentController');
Route::resource('instructors', 'InstructorController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', ['middleware' => 'admin', function () {

}]);

Route::get('/logout', 'HomeController@logout');