<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Supplier;
use App\Http\Requests;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('CompanyName', 'asc')
                                ->paginate(env('PAGINATE'));

        return view('pemasok.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasok.create');
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
                'CompanyName'   => 'required',
                'ContactName'   => 'required',
                'Phone'         => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('supplier/create')->withErrors($validator)->withInput();
            }

            Supplier::create($request->all());

            return redirect('supplier')->with('pesan_sukses', 'Data pemasok baru berhasil disimpan.');
        } 
        catch (\Exception $e) {
            return redirect('supplier')->with('pesan_gagal', $e->getMessage());
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
        $supplier = Supplier::where('SupplierID', $id)->first();

        return view('pemasok.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::where('SupplierID', $id)->first();

        return view('pemasok.edit', compact('supplier'));
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
                'CompanyName'   => 'required',
                'ContactName'   => 'required',
                'Phone'         => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('supplier/' . $id . '/edit')->withErrors($validator)->withInput();
            }
            
            Supplier::where('SupplierID', $id)->update($request->except('_method'));

            return redirect('supplier')->with('pesan_sukses', 'Data pemasok berhasil diubah.');
        } 
        catch (\Exception $e) {
            return redirect('supplier')->with('pesan_gagal', $e->getMessage());
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
            Supplier::where('SupplierID', '=', $id)->delete();

            return redirect('supplier')->with('pesan_sukses', 'Data pemasok berhasil dihapus.');
        }
        catch(\Exception $e) {
            return redirect('supplier')->with('pesan_gagal', $e->getMessage());
        }
    }
}
