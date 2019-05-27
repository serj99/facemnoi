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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/in_need_user', 'Auth\LoginController@showInNeedUserLoginForm');
Route::get('/login/to_do_user', 'Auth\LoginController@showToDoUserLoginForm');
Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('register');

Route::post('/login/in_need_user', 'Auth\LoginController@InNeedUserLogin');
Route::post('/login/to_do_user', 'Auth\LoginController@ToDoUserLogin');
Route::post('/register_in_need_user', 'Auth\RegisterController@createInNeedUser')->name('register_in_need_user');
Route::post('/register_to_do_user', 'Auth\RegisterController@createToDoUser')->name('register_to_do_user');

//Route::view('/home', 'home')->middleware('auth');
Route::view('/home/in_need_user', 'inneeduser');
Route::view('/home/to_do_user', 'todouser');

