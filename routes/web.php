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

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('login', 'LoginController@showLogin')->name('admin.login');
            Route::post('login', 'LoginController@authenticate');
        });
        Route::middleware('auth')->group(function () {
            Route::get('logout', 'LoginController@logout')->name('admin.logout');
        });
    });

    Route::middleware('auth')->group(function () {
        Route::namespace('Dashboard')->group(function () {
            Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        });
            /*--- Customers ----*/
            Route::namespace('Customer')->prefix('customer')->group(function () {
                Route::get('/', 'CustomerController@index')->name('admin.customer');
                Route::get('create', 'CustomerController@create')->name('admin.customer.create');
                Route::post('create', 'CustomerController@store')->name('admin.customer.store');
                Route::get('{token}/edit', 'CustomerController@edit')->name('admin.customer.edit');
                Route::put('{token}', 'CustomerController@update')->name('admin.customer.update');
                Route::delete('{token}', 'CustomerController@destroy')->name('admin.customer.destroy');
                Route::get('{token}', 'CustomerController@show')->name('admin.customer.show');
            });
            /*---/. Customers ----*/

            /*--- Loans ----*/
            Route::namespace('Loan')->prefix('loan')->group(function () {
                Route::get('/', 'LoanController@index')->name('admin.loan');
                Route::get('create', 'LoanController@create')->name('admin.loan.create');
                Route::post('create', 'LoanController@store')->name('admin.loan.store');
                Route::get('customer/{id}', 'LoanController@loanCustomer')->name('admin.loan.customer');
                Route::get('{token}/edit', 'LoanController@edit')->name('admin.loan.edit');
                Route::put('{token}', 'LoanController@update')->name('admin.loan.update');
                Route::delete('{token}', 'LoanController@destroy')->name('admin.loan.destroy');
                Route::get('{token}', 'LoanController@show')->name('admin.loan.show');
            });
            /*---/. Loans ----*/

            /*--- Payments ----*/
            Route::namespace('Payment')->prefix('payment')->group(function () {
                Route::get('create', 'PaymentController@create')->name('admin.payment.create');
            });
            /*---/. Payments ----*/
    });
});
