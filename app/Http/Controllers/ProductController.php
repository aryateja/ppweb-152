<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Product;
use App\Category;
use App\Supplier;
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
        $products = Product::orderBy('ProductName', 'asc')
                            ->leftJoin('categories', 'categories.CategoryID', '=', 'products.CategoryID')
                            ->paginate(env('PAGINATE'));

        return view('produk.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('CategoryName', 'asc')->get();
        $suppliers  = Supplier::orderBy('CompanyName', 'asc')->get();

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
            $validator = Validator::make($request->all(), [
                'ProductName'   => 'required|unique:products|max:255',
                'UnitPrice'     => 'required|numeric',
                'UnitsInStock'  => 'required|numeric',
                'UnitsOnOrder'  => 'required|numeric',
                'ReorderLevel'  => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return redirect('product/create')->withErrors($validator)->withInput();
            }

            Product::create($request->all());

            return redirect('product')->with('pesan_sukses', 'Data produk baru berhasil disimpan.');
        } 
        catch (\Exception $e) {
            return redirect('product')->with('pesan_gagal', $e->getMessage());
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
        try {
            $product = Product::where('ProductID', $id)
                                ->leftJoin('categories', 'categories.CategoryID', '=', 'products.CategoryID')
                                ->leftJoin('suppliers', 'suppliers.SupplierID', '=', 'suppliers.SupplierID')
                                ->firstOrFail();
        
            return view('produk.show', compact('product'));
        } 
        catch (\Exception $e) {
            return redirect('product')->with('pesan_gagal', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product    = Product::where('ProductID', $id)->firstOrFail();
            $categories = Category::orderBy('CategoryName', 'asc')->get();
            $suppliers  = Supplier::orderBy('CompanyName', 'asc')->get();

            return view('produk.edit', compact('product', 'categories', 'suppliers'));
        } 
        catch (\Exception $e) {
            return redirect('product')->with('pesan_gagal', $e->getMessage());
        }
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
        try {
            $validator = Validator::make($request->all(), [
                'ProductName'   => 'required|unique:products,productname,'. $id .',productid|max:255',
                'UnitPrice'     => 'required|numeric',
                'UnitsInStock'  => 'required|numeric',
                'UnitsOnOrder'  => 'required|numeric',
                'ReorderLevel'  => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return redirect('product/' . $id . '/edit')->withErrors($validator)->withInput();
            }

            Product::where('ProductID', $id)->update($request->except('_method'));

            return redirect('product')->with('pesan_sukses', 'Data produk berhasil diubah.');
        } 
        catch (\Exception $e) {
            return redirect('product')->with('pesan_gagal', $e->getMessage());
        }
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
            Product::where('ProductID', '=', $id)->delete();

            return redirect('product')->with('pesan_sukses', 'Data produk berhasil dihapus.');
        }
        catch(\Exception $e) {
            return redirect('product')->with('pesan_gagal', $e->getMessage());
        }
    }
}
