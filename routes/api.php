<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signup', 'AuthController@register'); Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'jwt.auth'], function () { 
    Route::get('auth', 'AuthController@user'); 
    Route::post('logout', 'AuthController@logout'); 
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');

$router->group(['prefix' => 'courses'], function (Router $router) {
    $router->get('/', 'CourseController@index');

});

//students
Route::group(['middleware' => 'jwt.auth'], function() {
    //GET
    Route::get('/students', 'StudentController@index');
});
//teachers
Route::group(['middleware' => 'jwt.auth'], function() {
    //GET
    Route::get('/teachers', 'TeacherController@index');
});

$router->group(['middleware' => 'jwt.auth'], function (Router $router) {
    $router->group(['prefix' => 'teachers'], function (Router $router) {
        $router->get('/{user_id}/courses', 'CourseController@userCourses');
    });
});

