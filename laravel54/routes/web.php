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
Route::get('reg', 'RegController@index');
Route::get('/login', 'admin\LoginController@login');
Route::get('/validation', 'admin\LoginController@validation');
Route::post('/add_user', 'admin\LoginController@add_user');
Route::get('/homeindex', 'home\IndexController@index');
Route::get('/hometop', 'home\IndexController@top');
Route::get('/homeleft', 'home\IndexController@left');
Route::get('/homeswich', 'home\IndexController@swich');
Route::get('/homemain', 'home\IndexController@main');
Route::get('/homebottom', 'home\IndexController@bottom');
Route::get('/adminindex', 'admin\IndexController@index');
