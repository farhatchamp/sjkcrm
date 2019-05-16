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

Route::get('/test', function () {
    // return App\User::find(2)->roles;
    return App\Role::with('users')->where('name', 'company')->get();
});

// Route::get('/', function () {
//     return view('admin/companies/index')->name('home');
// });

// if ( Auth::check())
// {
//     Route::get('/','AdminController@index');
// }
// else
// {
//     Route::get('/','HomeController@index');
// }

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'] , function(){

    Route::get('/companies',[
        'uses' => 'CompanyController@index',
        'as' => 'companies'
    ]);

    Route::get('/companies/CompanyListWindow/',[
        'uses' => 'CompanyController@CompanyListWindow',
        'as' => 'companies.CompanyListWindow'
    ]);

    Route::get('/company/create',[
        'uses' => 'CompanyController@create',
        'as' => 'company.create'
    ]);

    Route::post('/company/store',[
        'uses' => 'CompanyController@store',
        'as' => 'company.store'
    ]);

     Route::post('/company/show/{id}/contact',[
        'uses' => 'ContactController@store',
        'as' => 'contact.store'
    ]);

     Route::post('/company/show/{id}/domain',[
        'uses' => 'DomainController@store',
        'as' => 'domain.store'
    ]);



    Route::get('/company/edit/{id}',[
        'uses' => 'CompanyController@edit',
        'as' => 'company.edit'
    ]);

     Route::get('/company/show/{id}',[
        'uses' => 'CompanyController@show',
        'as' => 'company.show'
    ]);

    Route::post('/company/update/{id}',[
        'uses' => 'CompanyController@update',
        'as' => 'company.update'
    ]);
    
       Route::get('/company/delete/{id}',[
        'uses' => 'CompanyController@destroy',
        'as' => 'company.delete'
    ]);


   Route::get('company/activate/{id}',[
        'uses' => 'CompanyController@activate',
        'as' => 'company.activate'
    ]);

    Route::get('company/deactivate/{id}',[
        'uses' => 'CompanyController@deactivate',
        'as' => 'company.deactivate'
    ]);

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

    Route::get('/user/delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);


    Route::get('user/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ])->middleware('admin');

    Route::get('user/not_admin/{id}',[
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ])->middleware('admin');

    Route::get('user/activate/{id}',[
        'uses' => 'UsersController@activate',
        'as' => 'user.activate'
    ]);

    Route::get('user/deactivate/{id}',[
        'uses' => 'UsersController@deactivate',
        'as' => 'user.deactivate'
    ]);


});

