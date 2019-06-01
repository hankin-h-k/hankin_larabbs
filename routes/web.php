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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', 'TopicsController@index')->name('root');

Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

//注册页面
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('regiter');
Route::post('register', 'Auth\RegisterController@register');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
