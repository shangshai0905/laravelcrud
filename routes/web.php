<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

#{addname} is a required parameter
Route::get('/aboutus/{addname}', function ($name = 'Shaira') {
    return $name;
});

#{addname?} is optional parameter
Route::get('/aboutus/{addname?}', function ($name = 'Shaira') {
    return $name;
});


#BASIC CONTROLLER
                    #controllername::class, 'functionname'
Route::get('/users', [UserController::class, 'index']);


#RESOURCE CONTROLLER
Route::resource('/Students', StudentsController::class);

//allows to share route attributes
Route::group(['namespace' => 'App\Http\Controllers'], function () {

    //HOME ROUTES
    Route::get('/', 'HomeController@index')->name('home.index');

    //
    Route::group(['middleware' => ['guest']], function () {

        //LOGIN ROUTES
        Route::get('/login', 'LoginController@show')->name('login.show');
        //LOGIN POST
        Route::post('/login', 'LoginController@login')->name('login.perform');
        //REGISTER ROUTES
        Route::get('/register', 'RegisterController@show')->name('register.show');

        //POSTING THE DATA
        Route::post('/register', 'RegisterController@register')->name('register.perform');

    });

    Route::group(['middleware' => ['auth']], function () {
        //LOGOUT
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });

});


