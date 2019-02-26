<?php

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\DailySurvey;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('welcome', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return DailySurvey::all();
});

//Route::get('welcome','DailySurvey@chart');

/* Route::get('student', 'StudentController@index');

Route::get('student/{student}', 'StudentController@show');

Route::post('student','StudentController@store');

Route::put('student/{student}','StudentController@update');

Route::delete('student/{student}', 'StudentController@delete');
 */