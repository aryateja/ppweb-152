<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Category;
use App\Http\Requests;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->orderBy('CategoryName', 'asc')->get();
                                ->paginate(env('PAGINATE'));

        return view('kategori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
                'CategoryName'  => 'required|unique:categories|alpha|max:50',
                'Description'   => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('category/create')->withErrors($validator)->withInput();
            }

            return redirect('category')->with('pesan_sukses', 'Data kategori baru berhasil disimpan.');
        } 
        catch (\Exception $e) {
            return redirect('category')->with('pesan_gagal', $e->getMessage());
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
        //
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
            $category = Category::where('CategoryID', $id)->firstOrFail();

            return view('kategori.edit', compact('category'));
        } 
        catch (\Exception $e) {
            return redirect('category')->with('pesan_gagal', $e->getMessage());
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
                'CategoryName'  => 'required|unique:categories,categoryname,'. $id .',categoryid|alpha|max:50',
                'Description'   => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('category/' . $id . '/edit')->withErrors($validator)->withInput();
            }

            Category::where('CategoryID', $id)->update($request->except('_method'));

            return redirect('category')->with('pesan_sukses', 'Data kategori berhasil diubah.');
        } 
        catch (\Exception $e) {
            return redirect('category')->with('pesan_gagal', $e->getMessage());
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
            Category::where('CategoryID', '=', $id)->delete();

            return redirect('category')->with('pesan_sukses', 'Data kategori berhasil dihapus.');
        }
        catch (\Exception $e) {
            return redirect('category')->with('pesan_gagal', $e->getMessage());
        }
    }
}
