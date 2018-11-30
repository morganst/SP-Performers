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


Route::resource('', 'HomeController');
Route::resource('students', 'StudentController');
Route::resource('instructors', 'InstructorController');
Route::resource('classes', 'ClassController');
Route::get('classes/show/{id}', 'ClassController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','admin']], function() {
    Route::get('instructors/create', function(){
        return view('instructors/create');
    });



});

Route::get('/logout', 'HomeController@logout');

Route::get('/notes/createfor/{SID}', 'NotesController@createfor');
Route::get('/notes/createnew/{SID}', 'NotesController@createnew');

Route::resource('', 'HomeController');
Route::resource('students', 'StudentController');
Route::resource('instructors', 'InstructorController');
Route::resource('classes', 'ClassController');
Route::resource('notes', 'NotesController');

Route::post('/attachUser/{user_id}/{classes_id}', 'ClassController@attachUser');
Route::post('/detachUser/{user_id}/{classes_id}', 'ClassController@detachUser');
Route::get('classes/{id}/addUser', 'ClassController@addUser');

Route::post('/attachStudent/{student_id}/{classes_id}', 'ClassController@attachStudent');
Route::post('/detachStudent/{student_id}/{classes_id}', 'ClassController@detachStudent');
Route::get('classes/{id}/addStudent', 'ClassController@addStudent');

Route::resource('/dailysurvey','DailySurveyController');
Route::get('dailysurvey/create/{id}/{lookupID}', 'DailySurveyController@create');

