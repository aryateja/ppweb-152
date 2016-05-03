<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Shipper;
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
        $shippers = Shipper::orderBy('CompanyName', 'asc')
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
            $validator = Validator::make($request->all(), [
                'CompanyName'   => 'required',
                'Phone'         => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('shipper/create')->withErrors($validator)->withInput();
            }

            Shipper::create($request->all());

            return redirect('shipper')->with('pesan_sukses', 'Data kurir baru berhasil disimpan.');
        } 
        catch (\Exception $e) {
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
        $shipper = Shipper::where('ShipperID', $id)->first();

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
            $validator = Validator::make($request->all(), [
                'CompanyName'   => 'required',
                'Phone'         => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('shipper/' . $id . '/edit')->withErrors($validator)->withInput();
            }
            
            Shipper::where('ShipperID', $id)->update($request->except('_method'));

            return redirect('shipper')->with('pesan_sukses', 'Data kurir berhasil diubah.');
        } 
        catch (\Exception $e) {
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
            Shipper::where('ShipperID', '=', $id)->delete();

            return redirect('shipper')->with('pesan_sukses', 'Data kurir berhasil dihapus.');
        }
        catch(\Exception $e) {
            return redirect('shipper')->with('pesan_gagal', $e->getMessage());
        }
    }
}
