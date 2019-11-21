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
//Route::get('/home', function () {
//    return view('home');
//});

Route::get('/home', [
    'uses' => 'HomeController@index'
]);


Route::get('/terminate', [
    'middleware' => 'terminate',
    'uses' => 'ABCController@index',
]);

Route::get('/usercontroller/path', [
    'middleware' => 'First',
    'uses' => 'UserController@showPath'
]);


Route::get('/register', function() {
    return view('register');
});

Route::get('/login', function() {
    return view('login');
});


Route::post('/register/create', 'RegisterController@create');