<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category', 'CategoryController');


/************************************************************************************************/
/****************************************** EMPLOYEES *******************************************/

// Menampilkan semua data
Route::get('employee', function() {
    $employees = DB::table('employees')->orderBy('FirstName', 'asc')->get();

    return view('karyawan.index', compact('employees'));
});

// Menampilkan detil data tertentu
Route::get('employee/{id}/show', function($id) {
    $employee = DB::table('employees')->where('EmployeeID', $id)->first();

    return view('karyawan.show', compact('employee'));
});

// Menampilkan form untuk tambah data
Route::get('employee/create', function() {
    $employees = DB::table('employees')->orderBy('FirstName', 'asc')->get();

    return view('karyawan.create', compact('employees'));
});

// Menampilkan form untuk ubah data
Route::get('employee/{id}/edit', function($id) {
    $employee  = DB::table('employees')->where('EmployeeID', $id)->first();
    $employees = DB::table('employees')->orderBy('FirstName', 'asc')->get();

    return view('karyawan.edit', compact('employee', 'employees'));
});

// Memproses hapus data
Route::delete('/employee/{id}', function($id) {
    try {
        DB::table('employees')->where('EmployeeID', '=', $id)->delete();

        return redirect('employee')->with('pesan_sukses', 'Data karyawan berhasil dihapus.');
    }
    catch(Exception $e) {
        return redirect('employee')->with('pesan_gagal', $e->getMessage());
    }
});


/************************************************************************************************/
/****************************************** SUPPLIERS *******************************************/

// Menampilkan semua data
Route::get('supplier', function() {
    $suppliers = DB::table('suppliers')->orderBy('CompanyName', 'asc')->get();

    return view('pemasok.index', compact('suppliers'));
});

// Menampilkan detil data tertentu
Route::get('supplier/{id}/show', function($id) {
    $supplier = DB::table('suppliers')->where('SupplierID', $id)->first();

    return view('pemasok.show', compact('supplier'));
});


/************************************************************************************************/
/****************************************** CUSTOMERS *******************************************/

// Menampilkan semua data
Route::get('customer', function() {
    $customers = DB::table('customers')->orderBy('CustomerID', 'asc')->get();

    return view('pelanggan.index', compact('customers'));
});

// Menampilkan detil data tertentu
Route::get('customer/{id}/show', function($id) {
    $customer = DB::table('customers')->where('CustomerID', $id)->first();

    return view('pelanggan.show', compact('customer'));
});


/************************************************************************************************/
/****************************************** SHIPPERS ********************************************/

// Menampilkan semua data
Route::get('shipper', function() {
    $shippers = DB::table('shippers')->orderBy('CompanyName', 'asc')->get();

    return view('kurir.index', compact('shippers'));
});


/************************************************************************************************/
/****************************************** ORDERS **********************************************/

// Menampilkan semua data
Route::get('order', function() {
    $orders = DB::table('orders')
                    ->leftJoin('employees', 'employees.EmployeeID', '=', 'orders.EmployeeID')
                    ->leftJoin('customers', 'customers.CustomerID', '=', 'orders.CustomerID')
                    ->orderBy('OrderID', 'asc')
                    ->get();

    return view('pemesanan.index', compact('orders'));
});

// Menampilkan detil data tertentu
Route::get('order/{id}/show', function($id) {
    $order = DB::table('orders')
                ->leftJoin('employees', 'employees.EmployeeID', '=', 'orders.EmployeeID')
                ->leftJoin('customers', 'customers.CustomerID', '=', 'orders.CustomerID')
                // ->leftJoin('shippers', 'shippers.ShipperID', '=', 'orders.ShipVia')
                ->where('OrderID', $id)
                ->first();

    $order_details = DB::table('order details')
                        ->leftJoin('products', 'products.ProductID', '=', 'order details.ProductID')
                        ->where('OrderID', $id)
                        ->get();

    return view('pemesanan.show', compact('order', 'order_details'));
});
