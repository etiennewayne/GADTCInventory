<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/admin-home', 'AdminHomeController@showForm');


//Route::post('/checkpoint', 'CustomLoginController@authenticate');



Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/create', 'Auth\RegisterController@addAdminAccount');



Route::post('/register', 'Auth\RegisterController@showForm');
Route::post('/register/create', 'Auth\RegisterController@create');


Route::resource('admin-user', 'UserController');
Route::get('admin-user/api/users', 'UserController@fetchData');