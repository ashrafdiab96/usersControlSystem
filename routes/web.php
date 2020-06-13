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

// login

use App\Http\Middleware\is_operation;

Route::get('/', 'UsersController@login');

// handle login
Route::post('/users/handleLogin', 'UsersController@handle_login');

Route::group(['middleware' => ['auth']], function () {
    /**
     * users
     */
    // logout
    Route::get('/logout', 'UsersController@logout');

    // dashboard route
    Route::get('/dashboard', 'UsersController@index');

    // profile data
    Route::get('/users/show/{id}', 'UsersController@show');

    // permission to show the users page
    Route::group(['middleware' => ['view_users']], function () {
        // show all users
        Route::get('/users/showAll', 'UsersController@show_users');
    });

    // permission to edit users
    Route::group(['middleware' => ['edit_users']], function () {
        // register
        Route::get('/users/register', 'UsersController@create');

        // store register data
        Route::post('/users/store', 'UsersController@store');

        // edit users
        Route::get('/users/edit/{id}', 'UsersController@edit');

        // update users
        Route::post('/users/update/{id}', 'UsersController@update');

        // delete users
        Route::get('/users/delete/{id}', 'UsersController@destroy');

        // delete my account
        Route::get('/users/deleteAcc/{id}', 'UsersController@delete_account');
    });

    /**
     * operations
     */
    // permission to show the operations page
    Route::group(['middleware' => ['view_operation']], function () {
        // show operations page
        Route::get('/operations/show', 'OperationsController@show_operations');
    });

    // permission to edit in the operations
    Route::group(['middleware' => ['edit_operation']], function () {
        // create operation
        Route::get('/operations/create', 'OperationsController@create');

        // store operation data
        Route::post('/operations/store', 'OperationsController@store');

        // edit operation
        Route::get('/operations/edit/{id}', 'OperationsController@edit');

        // update operation
        Route::post('/operations/update/{id}', 'OperationsController@update');

        // delete operation
        Route::get('/operations/delete/{id}', 'OperationsController@destroy');
    });

    /**
     * finance
     */
    // permission to show the finance page
    Route::group(['middleware' => ['view_finance']], function () {
        // show finance page
        Route::get('/finance/show', 'FinanceController@show_operations');
    });

    // permission to edit the finances
    Route::group(['middleware' => ['edit_finance']], function () {
        // create finance
        Route::get('/finance/create', 'FinanceController@create');

        // store finance data
        Route::post('/finance/store', 'FinanceController@store');

        // edit finance
        Route::get('/finance/edit/{id}', 'FinanceController@edit');

        // update finance
        Route::post('/finance/update/{id}', 'FinanceController@update');

        // delete finance
        Route::get('/finance/delete/{id}', 'FinanceController@destroy');
    });
});

// notauth for not logged users
Route::get('/notauth', 'UsersController@notauth');

// notauth for not logged users
Route::get('/notfound', function() {
    return view('notfound');
});
