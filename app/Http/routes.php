<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

/************************************************************************************************/
/****************************************** CATEGORIES ******************************************/

// Menampilkan semua data
Route::get('category', function() {
    $categories = DB::table('categories')->get();

    return view('kategori.index', compact('categories'));
});

// Menampilkan form untuk ubah data
Route::get('category/{id}/edit', function($id) {
    $category = DB::table('categories')->where('CategoryID', $id)->first();

    return view('kategori.edit', compact('category'));
});

// Memproses edit data
Route::patch('category/{id}', function($id, Request $request) {
    DB::table('categories')
        ->where('CategoryID', $id)
        ->update([
                'CategoryName'  => $request->input('CategoryName'),
                'Description'   => $request->input('Description')
            ]);

    return redirect('category')->with('pesan_sukses', 'Data kategori berhasil diubah.');
});

// Menampilkan form untuk tambah data
Route::get('category/create', function() {
    return view('kategori.create');
});

// Memproses tambah data
Route::post('category', function(Request $request) {
    $id = DB::table('categories')->insertGetId([
        'CategoryName'  => $request->input('CategoryName'), 
        'Description'   => $request->input('Description')
    ]);

    if ($id > 0)
    {
        return redirect('category')->with('pesan_sukses', 'Data kategori baru berhasil disimpan.');
    }
});

// Memproses hapus data
Route::delete('/category/{id}', function($id) {
    try {
        DB::table('categories')->where('CategoryID', '=', $id)->delete();

        return redirect('category')->with('pesan_sukses', 'Data kategori berhasil dihapus.');
    }
    catch(Exception $e) {
        return redirect('category')->with('pesan_gagal', $e->getMessage());
    }
});


/************************************************************************************************/
/****************************************** PRODUCTS ********************************************/

// Menampilkan semua data
Route::get('product', function() {
    $products = DB::table('products')
                    ->leftJoin('categories', 'categories.CategoryID', '=', 'products.CategoryID')
                    ->get();

    return view('produk.index', compact('products'));
});

// Menampilkan detil data tertentu
Route::get('product/{id}/show', function($id) {
    $product = DB::table('products')
                    ->leftJoin('categories', 'categories.CategoryID', '=', 'products.CategoryID')
                    ->leftJoin('suppliers', 'suppliers.SupplierID', '=', 'products.SupplierID')
                    ->where('ProductID', $id)->first();

    return view('produk.show', compact('product'));
});


/************************************************************************************************/
/****************************************** EMPLOYEES *******************************************/

// Menampilkan semua data
Route::get('employee', function() {
    $employees = DB::table('employees')->get();

    return view('karyawan.index', compact('employees'));
});

// Menampilkan detil data tertentu
Route::get('employee/{id}/show', function($id) {
    $employee = DB::table('employees')->where('EmployeeID', $id)->first();

    return view('karyawan.show', compact('employee'));
});


/************************************************************************************************/
/****************************************** SUPPLIERS *******************************************/

// Menampilkan semua data
Route::get('supplier', function() {
    $suppliers = DB::table('suppliers')->get();

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
    $customers = DB::table('customers')->get();

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
    $shippers = DB::table('shippers')->get();

    return view('kurir.index', compact('shippers'));
});


/************************************************************************************************/
/****************************************** ORDERS **********************************************/

// Menampilkan semua data
Route::get('order', function() {
    $orders = DB::table('orders')
                    ->leftJoin('employees', 'employees.EmployeeID', '=', 'orders.EmployeeID')
                    ->leftJoin('customers', 'customers.CustomerID', '=', 'orders.CustomerID')
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
