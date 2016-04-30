<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use DB;
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
        $categories = DB::table('categories')
                        ->orderBy('CategoryName', 'asc')
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
            $this->validate($request, [
                'CategoryName'  => 'required|unique:categories|alpha|max:50',
                'Description'   => 'required'
            ]);

            $id = DB::table('categories')->insert([
                'CategoryName'  => $request->input('CategoryName'), 
                'Description'   => $request->input('Description')
            ]);

            return redirect('category')->with('pesan_sukses', 'Data kategori baru berhasil disimpan.');
        } 
        catch (QueryException $e) {
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
        $category = DB::table('categories')->where('CategoryID', $id)->first();

        return view('kategori.edit', compact('category'));
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
            $this->validate($request, [
                'CategoryName'  => 'required|unique:categories,categoryname,'. $id .',categoryid|alpha|max:50',
                'Description'   => 'required'
            ]);

            DB::table('categories')
                ->where('CategoryID', $id)
                ->update([
                    'CategoryName'  => $request->input('CategoryName'),
                    'Description'   => $request->input('Description')
                ]);

            return redirect('category')->with('pesan_sukses', 'Data kategori berhasil diubah.');
        } 
        catch (QueryException $e) {
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
            DB::table('categories')->where('CategoryID', '=', $id)->delete();

            return redirect('category')->with('pesan_sukses', 'Data kategori berhasil dihapus.');
        }
        catch (QueryException $e) {
            return redirect('category')->with('pesan_gagal', $e->getMessage());
        }
    }
}
