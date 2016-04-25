<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');
Route::resource('employee', 'EmployeeController');
Route::resource('supplier', 'SupplierController');
Route::resource('customer', 'CustomerController');
Route::resource('shipper', 'ShipperController');
Route::resource('order', 'OrderController');
