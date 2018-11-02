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
use App\Pretest;
use App\Student;

Route::get('/', function () {
    return view('home');
});

Route::resource('students', 'StudentController');
Route::resource('instructors', 'InstructorController');
Route::resource('pretest', 'PretestController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('students/pretest/{id?}', function($id = null)
    {
        // get all the blog stuff from database
        // if a category was passed, use that
        // if no category, get all posts
        if ($id)
        {
            $pretest = Pretest::where('student_id', '=', $id)->get();
            $stu = Student::find($id);
        }

        // show the view with blog posts (app/views/blog.blade.php)
        return View::make('students.pretest')
            ->with('pretest', $pretest)
            ->with('stu', $stu);
    });
