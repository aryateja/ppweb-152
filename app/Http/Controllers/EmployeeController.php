<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use DB;
use App\Http\Requests;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')->orderBy('FirstName', 'asc')->get();

        return view('karyawan.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = DB::table('employees')->orderBy('FirstName', 'asc')->get();

        return view('karyawan.create', compact('employees'));
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
                'FirstName'     => 'required',
                'BirthDate'     => 'required|date_format:Y-m-d',
                'HireDate'      => 'required|date_format:Y-m-d H:i:s',
                'Salary'        => 'required|numeric'
            ]);

            $id = DB::table('employees')->insertGetId([
                'FirstName'         => $request->input('FirstName'),
                'LastName'          => $request->input('LastName'),
                'Title'             => $request->input('Title'),
                'TitleOfCourtesy'   => $request->input('TitleOfCourtesy'),
                'BirthDate'         => $request->input('BirthDate'),
                'HireDate'          => $request->input('HireDate'),
                'Address'           => $request->input('Address'),
                'City'              => $request->input('City'),
                'Region'            => $request->input('Region'),
                'PostalCode'        => $request->input('PostalCode'),
                'Country'           => $request->input('Country'),
                'HomePhone'         => $request->input('HomePhone'),
                'Extension'         => $request->input('Extension'),
                'Photo'             => $request->input('Photo'),
                'Notes'             => $request->input('Notes'),
                'ReportsTo'         => $request->input('ReportsTo'),
                'Salary'            => $request->input('Salary')
            ]);

            if ($id > 0) {
                return redirect('employee')->with('pesan_sukses', 'Data karyawan baru berhasil disimpan.');
            }
        } 
        catch (QueryException $e) {
            return redirect('employee')->with('pesan_gagal', $e->getMessage());
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
        $employee = DB::table('employees')->where('EmployeeID', $id)->first();

        return view('karyawan.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee  = DB::table('employees')->where('EmployeeID', $id)->first();
        $employees = DB::table('employees')->orderBy('FirstName', 'asc')->get();

        return view('karyawan.edit', compact('employee', 'employees'));
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
                'FirstName'     => 'required',
                'BirthDate'     => 'required|date_format:Y-m-d',
                'HireDate'      => 'required|date_format:Y-m-d H:i:s',
                'Salary'        => 'required|numeric'
            ]);
            
            DB::table('employees')
                ->where('EmployeeID', $id)
                ->update([
                        'FirstName'         => $request->input('FirstName'),
                        'LastName'          => $request->input('LastName'),
                        'Title'             => $request->input('Title'),
                        'TitleOfCourtesy'   => $request->input('TitleOfCourtesy'),
                        'BirthDate'         => $request->input('BirthDate'),
                        'HireDate'          => $request->input('HireDate'),
                        'Address'           => $request->input('Address'),
                        'City'              => $request->input('City'),
                        'Region'            => $request->input('Region'),
                        'PostalCode'        => $request->input('PostalCode'),
                        'Country'           => $request->input('Country'),
                        'HomePhone'         => $request->input('HomePhone'),
                        'Extension'         => $request->input('Extension'),
                        'Photo'             => $request->input('Photo'),
                        'Notes'             => $request->input('Notes'),
                        'ReportsTo'         => $request->input('ReportsTo'),
                        'Salary'            => $request->input('Salary')
                    ]);

            return redirect('employee')->with('pesan_sukses', 'Data karyawan berhasil diubah.');   
        } 
        catch (QueryException $e) {
            return redirect('employee')->with('pesan_gagal', $e->getMessage());
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
            DB::table('employees')->where('EmployeeID', '=', $id)->delete();
            
            return redirect('employee')->with('pesan_sukses', 'Data karyawan berhasil dihapus.');
        }
        catch(QueryException $e) {
            return redirect('employee')->with('pesan_gagal', $e->getMessage());
        }
    }
}