<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

/************************************************************************************************/
/****************************************** CATEGORIES ******************************************/

// Menampilkan semua data
Route::get('category', function() {
    $categories = DB::table('categories')->orderBy('CategoryName', 'asc')->get();

    return view('kategori.index', compact('categories'));
});

// Menampilkan form untuk tambah data
Route::get('category/create', function() {
    return view('kategori.create');
});

// Memproses tambah data
Route::post('category', function(Request $request) {
    try {
        $id = DB::table('categories')->insertGetId([
            'CategoryName'  => $request->input('CategoryName'), 
            'Description'   => $request->input('Description')
        ]);

        if ($id > 0) {
            return redirect('category')->with('pesan_sukses', 'Data kategori baru berhasil disimpan.');
        }
    } 
    catch (Exception $e) {
        return redirect('category')->with('pesan_gagal', $e->getMessage());
    }
});

// Menampilkan form untuk ubah data
Route::get('category/{id}/edit', function($id) {
    $category = DB::table('categories')->where('CategoryID', $id)->first();

    return view('kategori.edit', compact('category'));
});

// Memproses ubah data
Route::patch('category/{id}', function($id, Request $request) {
    DB::table('categories')
        ->where('CategoryID', $id)
        ->update([
                'CategoryName'  => $request->input('CategoryName'),
                'Description'   => $request->input('Description')
            ]);

    return redirect('category')->with('pesan_sukses', 'Data kategori berhasil diubah.');
});

// Memproses hapus data
Route::delete('/category/{id}', function($id) {
    try {
        DB::table('categories')->where('CategoryID', '=', $id)->delete();

        return redirect('category')->with('pesan_sukses', 'Data kategori berhasil dihapus.');
    }
    catch (Exception $e) {
        return redirect('category')->with('pesan_gagal', $e->getMessage());
    }
});


/************************************************************************************************/
/****************************************** PRODUCTS ********************************************/

// Menampilkan semua data
Route::get('product', function() {
    $products = DB::table('products')
                    ->leftJoin('categories', 'categories.CategoryID', '=', 'products.CategoryID')
                    ->orderBy('ProductName', 'asc')
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

// Menampilkan form untuk tambah data
Route::get('product/create', function() {
    $categories = DB::table('categories')->orderBy('CategoryName', 'asc')->get();
    $suppliers  = DB::table('suppliers')->orderBy('CompanyName', 'asc')->get();

    return view('produk.create', compact('categories', 'suppliers'));
});

// Memproses tambah data
Route::post('product', function(Request $request) {
    try {
        $id = DB::table('products')->insertGetId([
            'ProductName'       => $request->input('ProductName'), 
            'SupplierID'        => $request->input('SupplierID'),
            'CategoryID'        => $request->input('CategoryID'),
            'QuantityPerUnit'   => $request->input('QuantityPerUnit'), 
            'UnitPrice'         => $request->input('UnitPrice'), 
            'UnitsInStock'      => $request->input('UnitsInStock'), 
            'UnitsOnOrder'      => $request->input('UnitsOnOrder'), 
            'ReorderLevel'      => $request->input('ReorderLevel'), 
            'Discontinued'      => $request->input('Discontinued') ? DB::raw(1) : DB::raw(0)
        ]);

        if ($id > 0) {
            return redirect('product')->with('pesan_sukses', 'Data produk baru berhasil disimpan.');
        }
    } 
    catch (Exception $e) {
        return redirect('product/create')->with('pesan_gagal', $e->getMessage());
    }
});

// Menampilkan form untuk ubah data
Route::get('product/{id}/edit', function($id) {
    $product    = DB::table('products')->where('ProductID', $id)->first();
    $categories = DB::table('categories')->orderBy('CategoryName', 'asc')->get();
    $suppliers  = DB::table('suppliers')->orderBy('CompanyName', 'asc')->get();

    return view('produk.edit', compact('product', 'categories', 'suppliers'));
});

// Memproses ubah data
Route::patch('product/{id}', function($id, Request $request) {
    DB::table('products')
        ->where('ProductID', $id)
        ->update([
                'ProductName'       => $request->input('ProductName'), 
                'SupplierID'        => $request->input('SupplierID'),
                'CategoryID'        => $request->input('CategoryID'),
                'QuantityPerUnit'   => $request->input('QuantityPerUnit'), 
                'UnitPrice'         => $request->input('UnitPrice'), 
                'UnitsInStock'      => $request->input('UnitsInStock'), 
                'UnitsOnOrder'      => $request->input('UnitsOnOrder'), 
                'ReorderLevel'      => $request->input('ReorderLevel'), 
                'Discontinued'      => $request->input('Discontinued') ? DB::raw(1) : DB::raw(0)
            ]);

    return redirect('product')->with('pesan_sukses', 'Data produk berhasil diubah.');
});

// Memproses hapus data
Route::delete('/product/{id}', function($id) {
    try {
        DB::table('products')->where('ProductID', '=', $id)->delete();

        return redirect('product')->with('pesan_sukses', 'Data produk berhasil dihapus.');
    }
    catch(Exception $e) {
        return redirect('product')->with('pesan_gagal', $e->getMessage());
    }
});


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
