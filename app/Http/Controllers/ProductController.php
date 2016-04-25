<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
                        ->leftJoin('categories', 'categories.CategoryID', '=', 'products.CategoryID')
                        ->orderBy('ProductName', 'asc')
                        ->get();

        return view('produk.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->orderBy('CategoryName', 'asc')->get();
        $suppliers  = DB::table('suppliers')->orderBy('CompanyName', 'asc')->get();

        return view('produk.create', compact('categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')
                        ->leftJoin('categories', 'categories.CategoryID', '=', 'products.CategoryID')
                        ->leftJoin('suppliers', 'suppliers.SupplierID', '=', 'products.SupplierID')
                        ->where('ProductID', $id)->first();

        return view('produk.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product    = DB::table('products')->where('ProductID', $id)->first();
        $categories = DB::table('categories')->orderBy('CategoryName', 'asc')->get();
        $suppliers  = DB::table('suppliers')->orderBy('CompanyName', 'asc')->get();

        return view('produk.edit', compact('product', 'categories', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table('products')->where('ProductID', '=', $id)->delete();

            return redirect('product')->with('pesan_sukses', 'Data produk berhasil dihapus.');
        }
        catch(Exception $e) {
            return redirect('product')->with('pesan_gagal', $e->getMessage());
        }
    }
}
