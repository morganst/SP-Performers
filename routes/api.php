<?php

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

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

/* Route::get('student', 'StudentController@index');
 
Route::get('student/{student}', 'StudentController@show');
 
Route::post('student','StudentController@store');
 
Route::put('student/{student}','StudentController@update');
 
Route::delete('student/{student}', 'StudentController@delete');
 */