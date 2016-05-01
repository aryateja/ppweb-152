<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use DB;
use DateTime;
use App\Http\Requests;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('customers')
                        ->orderBy('CustomerID', 'asc')
                        ->paginate(env('PAGINATE'));

        return view('pelanggan.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
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
                'CustomerID'    => 'required|alpha|size:5|unique:customers',
                'CompanyName'   => 'required',
                'Phone'         => 'required'
            ]);

            $id = DB::table('customers')->insert([
                'CustomerID'    => $request->input('CustomerID'), 
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
                'created_at'    => new DateTime(),
                'updated_at'    => new DateTime()
            ]);

            return redirect('customer')->with('pesan_sukses', 'Data pelanggan baru berhasil disimpan.');
        } 
        catch (QueryException $e) {
            return redirect('customer')->with('pesan_gagal', $e->getMessage());
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
        $customer = DB::table('customers')->where('CustomerID', $id)->first();

        return view('pelanggan.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = DB::table('customers')->where('CustomerID', $id)->first();

        return view('pelanggan.edit', compact('customer'));
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
                'CompanyName'   => 'required',
                'Phone'         => 'required'
            ]);

            DB::table('customers')
                ->where('CustomerID', $id)
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
                        'updated_at'    => new DateTime()
                    ]);

            return redirect('customer')->with('pesan_sukses', 'Data pelanggan berhasil diubah.');
        } 
        catch (QueryException $e) {
            return redirect('customer')->with('pesan_gagal', $e->getMessage());
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
            DB::table('customers')->where('CustomerID', '=', $id)->delete();

            return redirect('customer')->with('pesan_sukses', 'Data pelanggan berhasil dihapus.');
        }
        catch(QueryException $e) {
            return redirect('customer')->with('pesan_gagal', $e->getMessage());
        }
    }
}
