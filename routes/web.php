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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('users', 'UsersController@index')->name('users.index');
Route::post('users', 'UsersController@store')->where(['user' => '[0-9]+'])->name('users.store');
Route::get('users/create', 'UsersController@create')->where(['user' => '[0-9]+'])->name('users.create');
Route::get('profile/{user}', 'UsersController@show')->where(['user' => '[0-9]+'])->name('users.show');
Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::put('users/{user}', 'UsersController@update')->name('users.update');
Route::get('users/{user}/password', 'UsersController@editPassword')->name('users.edit_password');
Route::put('users/{user}/password', 'UsersController@updatePassword')->name('users.update_password');
Route::delete('users/{user}', 'UsersController@destroy')->name('users.destroy');
Route::get('profile/edit/{user}' , 'ProfilesController@edit')->name('profile.edit');
Route::put('profile/{user}' , 'ProfilesController@update')->name('profile.update');