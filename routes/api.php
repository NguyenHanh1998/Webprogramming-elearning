<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

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

//Auth
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signup', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('auth', 'AuthController@user');
    Route::post('logout', 'AuthController@logout');
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');


//students
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::group(['prefix' => 'students'], function () {
        //GET
        Route::get('/', 'StudentController@index');
    });
});


//teachers
Route::group(['middleware' => 'jwt.auth'], function () {
    //GET
    Route::get('/teachers', 'TeacherController@index');
});
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::group(['prefix' => 'teachers'], function () {
        Route::get('/{user_id}/courses', 'CourseController@userCourses');
        Route::get('/{id}/statistics', 'TeacherController@statistics');
        Route::post('/{user_id}/courses/new', 'CourseController@store');
        Route::patch('/{user_id}/courses/{id}', 'CourseController@update');
        Route::get('/{user_id}/courses/{id}/statics', 'CourseController@enrolledStudent');
    });
});

//courses
Route::group(['middleware' => 'jwt.auth'], function () {
    //GET
    Route::put('/courses/{id}', 'CourseController@update');
});
Route::group(['prefix' => 'courses'], function () {
    Route::get('/', 'CourseController@index');
    Route::get('/{id}', 'CourseController@show');
});

//categories
Route::group(['middleware' => 'jwt.auth'], function () {
    //PUT
    Route::put('/categories/{id}', 'CategoryController@update');
});
