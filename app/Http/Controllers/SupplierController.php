<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use DB;
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
        $suppliers = DB::table('suppliers')->orderBy('CompanyName', 'asc')->get();

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
            $id = DB::table('suppliers')->insertGetId([
                'CompanyName'   => $request->input('CompanyName'), 
                'ContactName'   => $request->input('ContactName'), 
                'ContactTitle'  => $request->input('ContactTitle'), 
                'Address'       => $request->input('Address'), 
                'City'          => $request->input('City'), 
                'Region'        => $request->input('Region'), 
                'PostalCode'    => $request->input('PostalCode'), 
                'Country'       => $request->input('Country'), 
                'Phone'         => $request->input('Phone'), 
                'Fax'           => $request->input('Fax'), 
                'HomePage'      => $request->input('HomePage')
            ]);

            if ($id > 0) {
                return redirect('supplier')->with('pesan_sukses', 'Data pemasok baru berhasil disimpan.');
            }
        } 
        catch (QueryException $e) {
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
        $supplier = DB::table('suppliers')->where('SupplierID', $id)->first();

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
        $supplier = DB::table('suppliers')->where('SupplierID', $id)->first();

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
            DB::table('suppliers')
                ->where('SupplierID', $id)
                ->update([
                        'CompanyName'   => $request->input('CompanyName'), 
                        'ContactName'   => $request->input('ContactName'), 
                        'ContactTitle'  => $request->input('ContactTitle'), 
                        'Address'       => $request->input('Address'), 
                        'City'          => $request->input('City'), 
                        'Region'        => $request->input('Region'), 
                        'PostalCode'    => $request->input('PostalCode'), 
                        'Country'       => $request->input('Country'), 
                        'Phone'         => $request->input('Phone'), 
                        'Fax'           => $request->input('Fax'), 
                        'HomePage'      => $request->input('HomePage')
                    ]);

            return redirect('supplier')->with('pesan_sukses', 'Data pemasok berhasil diubah.');
        } 
        catch (QueryException $e) {
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
            DB::table('suppliers')->where('SupplierID', '=', $id)->delete();

            return redirect('supplier')->with('pesan_sukses', 'Data pemasok berhasil dihapus.');
        }
        catch(QueryException $e) {
            return redirect('supplier')->with('pesan_gagal', $e->getMessage());
        }
    }
}
