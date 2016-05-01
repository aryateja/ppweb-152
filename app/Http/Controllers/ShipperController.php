<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use DB;
use DateTime;
use App\Http\Requests;

class ShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippers = DB::table('shippers')
                        ->orderBy('CompanyName', 'asc')
                        ->paginate(env('PAGINATE'));

        return view('kurir.index', compact('shippers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kurir.create');
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
                'CompanyName'   => 'required',
                'Phone'         => 'required'
            ]);

            $id = DB::table('shippers')->insertGetId([
                'CompanyName'   => $request->input('CompanyName'), 
                'Phone'         => $request->input('Phone'),
                'created_at'    => new DateTime(),
                'updated_at'    => new DateTime
            ]);

            if ($id > 0) {
                return redirect('shipper')->with('pesan_sukses', 'Data kurir baru berhasil disimpan.');
            }
        } 
        catch (QueryException $e) {
            return redirect('shipper')->with('pesan_gagal', $e->getMessage());
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
        $shipper = DB::table('shippers')->where('ShipperID', $id)->first();

        return view('kurir.edit', compact('shipper'));
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
            
            DB::table('shippers')
                ->where('ShipperID', $id)
                ->update([
                        'CompanyName'   => $request->input('CompanyName'), 
                        'Phone'         => $request->input('Phone'),
                        'updated_at'    => new DateTime
                    ]);

            return redirect('shipper')->with('pesan_sukses', 'Data kurir berhasil diubah.');
        } 
        catch (QueryException $e) {
            return redirect('shipper')->with('pesan_gagal', $e->getMessage());
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
            DB::table('shippers')->where('ShipperID', '=', $id)->delete();

            return redirect('shipper')->with('pesan_sukses', 'Data kurir berhasil dihapus.');
        }
        catch(QueryException $e) {
            return redirect('shipper')->with('pesan_gagal', $e->getMessage());
        }
    }
}
