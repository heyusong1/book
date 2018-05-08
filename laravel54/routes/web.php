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


Route::post('/page', 'PostController@store');

Route::get('reg', 'RegController@index');
Route::get('/login', 'admin\LoginController@login');
Route::get('/validation', 'admin\LoginController@validation');
Route::post('/add_user', 'admin\LoginController@add_user');
Route::get('/homeindex', 'home\IndexController@index');
Route::get('/hometop', 'home\IndexController@top');
Route::get('/homeleft', 'home\IndexController@left');
Route::get('/homeswich', 'home\IndexController@swich');
Route::get('/adminindex', 'admin\IndexController@index');
Route::get('/homemain', 'home\IndexController@main_info');
Route::get('/homebottom', 'home\IndexController@bottom');
// Route::get('/homelogin', 'home\IndexController@');
Route::any('/home_change_password', 'home\AdminController@admin_change_password');
Route::any('/home_insert_admin', 'home\AdminController@admin_insert_user');
Route::any('/home_show_admin', 'home\AdminController@admin_show_user');
Route::any('/insert_user_one', 'home\AdminController@insert_user');
Route::any('/show_user_one', 'home\AdminController@user_show_one');
Route::any('/update_user_one', 'home\AdminController@user_update_one');
Route::any('/adminorder', 'admin\OrderController@order');


