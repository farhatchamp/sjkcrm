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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'] , function(){



});

Route::get('/users',[
    'uses' => 'UsersController@index',
    'as' => 'users'
]);
Route::get('/user/create',[
    'uses' => 'UsersController@create',
    'as' => 'user.create'
]);
Route::post('/user/store',[
    'uses' => 'UsersController@store',
    'as' => 'user.store'
]);

Route::get('/user/edit/{id}',[
    'uses' => 'UsersController@edit',
    'as' => 'user.edit'

]);

Route::post('/user/update/{id}',[
    'uses' => 'UsersController@update',
    'as' => 'user.update'
]);