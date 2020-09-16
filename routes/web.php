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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['prefix' => 'category'] , function(){
    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/store', 'CategoryController@store')->name('category.store');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/delete{id}', 'CategoryController@destroy')->name('category.delete');
});
Route::group(['prefix' => 'product'] , function(){
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::post('/store', 'ProductController@store')->name('product.store');
    Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('/update/{id}', 'ProductController@update')->name('product.update');
    Route::get('/delete{id}', 'ProductController@destroy')->name('product.delete');
});
Route::group(['prefix' => 'customer'] , function(){
    Route::get('/', 'CustomerController@index')->name('customer.index');
    Route::get('/create', 'CustomerController@create')->name('customer.create');
    Route::post('/store', 'CustomerController@store')->name('customer.store');
    Route::get('/edit/{id}', 'CustomerController@edit')->name('customer.edit');
    Route::post('/update/{id}', 'CustomerController@update')->name('customer.update');
    Route::get('/delete{id}', 'CustomerController@destroy')->name('customer.delete');
});
Route::group(['prefix' => 'supplier'] , function(){
    Route::get('/', 'SupplierController@index')->name('supplier.index');
    Route::get('/create', 'SupplierController@create')->name('supplier.create');
    Route::post('/store', 'SupplierController@store')->name('supplier.store');
    Route::get('/edit/{id}', 'SupplierController@edit')->name('supplier.edit');
    Route::post('/update/{id}', 'SupplierController@update')->name('supplier.update');
    Route::get('/delete{id}', 'SupplierController@destroy')->name('supplier.delete');
});
Route::group(['prefix' => 'salary'] , function(){
    Route::get('/', 'SalaryController@index')->name('salary.index');
    Route::get('/create', 'SalaryController@create')->name('salary.create');
    Route::post('/store', 'SalaryController@store')->name('salary.store');
    Route::get('/edit/{id}', 'SalaryController@edit')->name('salary.edit');
    Route::post('/update/{id}', 'SalaryController@update')->name('salary.update');
    Route::get('/delete{id}', 'SalaryController@destroy')->name('salary.delete');
});
Route::group(['prefix' => 'expense'] , function(){
    Route::get('/', 'ExpenseController@index')->name('expense.index');
    Route::get('/create', 'ExpenseController@create')->name('expense.create');
    Route::post('/store', 'ExpenseController@store')->name('expense.store');
    Route::get('/edit/{id}', 'ExpenseController@edit')->name('expense.edit');
    Route::post('/update/{id}', 'ExpenseController@update')->name('expense.update');
    Route::get('/delete{id}', 'ExpenseController@destroy')->name('expense.delete');
});
Route::group(['prefix' => 'empolyee'] , function(){
    Route::get('/', 'EmpolyeeController@index')->name('empolyee.index');
    Route::get('/create', 'EmpolyeeController@create')->name('empolyee.create');
    Route::post('/store', 'EmpolyeeController@store')->name('empolyee.store');
    Route::get('/edit/{id}', 'EmpolyeeController@edit')->name('empolyee.edit');
    Route::post('/update/{id}', 'EmpolyeeController@update')->name('empolyee.update');
    Route::get('/delete{id}', 'EmpolyeeController@destroy')->name('empolyee.delete');
});


Route::get('/pos', 'PosController@index')->name('pos.index');
Route::get('/pos_done/{id}', 'PosController@posDone')->name('pos.done');

Route::get('/pending/orders', 'PosController@pendingOrders')->name('pending.orders');
Route::get('/success/orders', 'PosController@successOrders')->name('success.orders');
Route::get('/view/orders/{id}', 'PosController@viewOrders')->name('view.orders');

Route::group(['prefix' => 'cart'] , function(){
    Route::post('/', 'CartController@addToCart')->name('cart');
    Route::post('/update/{rowId}', 'CartController@update')->name('cart.update');
    Route::get('/destroy/{rowId}', 'CartController@destroy')->name('cart.destroy');
});


Route::post('/invoice', 'CartController@invoice')->name('invoice');
Route::post('/final/invoice', 'CartController@final_invoice')->name('final.invoice');

