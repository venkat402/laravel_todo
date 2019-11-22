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

Route::post('login/post', "LoginController@login");


Route::post('/register/create', 'RegisterController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/task/save', 'TaskController@save');

Route::get('/task/delete/{id}', 'TaskController@delete')->name('home');

Route::get('/task/status/{id}', 'TaskController@status');
Route::get('/task/update/{id}', 'TaskController@updateGet');
Route::post('/task/update/{id}', 'TaskController@updatePost');
