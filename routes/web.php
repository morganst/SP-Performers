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

Route::get('/unauthorized', function () {
    return view('unauthorized');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','admin']], function() {
    Route::get('/create', function(){
        return view('instructors/create');
    });
});

Route::get('/logout', 'HomeController@logout');

Route::get('/notes/createfor/{SID}', 'NotesController@createfor');

Route::resource('/dailysurvey','DailySurveyController');
Route::resource('', 'HomeController');
Route::resource('students', 'StudentController');
Route::resource('instructors', 'InstructorController');
Route::resource('classes', 'ClassController');
Route::resource('notes', 'NotesController');