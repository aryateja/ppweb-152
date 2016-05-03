<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Employee;
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
        $employees = Employee::orderBy('FirstName', 'asc')
                                ->paginate(env('PAGINATE'));

        return view('karyawan.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::orderBy('FirstName', 'asc')->get();

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
            $validator = Validator::make($request->all(), [
                'FirstName'     => 'required',
                'BirthDate'     => 'required|date_format:Y-m-d',
                'HireDate'      => 'required|date_format:Y-m-d H:i:s',
                'Salary'        => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return redirect('employee/create')->withErrors($validator)->withInput();
            }

            Employee::create($request->all());

            return redirect('employee')->with('pesan_sukses', 'Data karyawan baru berhasil disimpan.');
        } 
        catch (\Exception $e) {
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
        $employee = Employee::where('EmployeeID', $id)->first();

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
        $employee  = Employee::where('EmployeeID', $id)->first();
        $employees = Employee::orderBy('FirstName', 'asc')->get();

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
            $validator = Validator::make($request->all(), [
                'FirstName'     => 'required',
                'BirthDate'     => 'required|date_format:Y-m-d',
                'HireDate'      => 'required|date_format:Y-m-d H:i:s',
                'Salary'        => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return redirect('employee/' . $id . '/edit')->withErrors($validator)->withInput();
            }
            
            Employee::where('EmployeeID', $id)->update($request->except('_method'));

            return redirect('employee')->with('pesan_sukses', 'Data karyawan berhasil diubah.');   
        } 
        catch (\Exception $e) {
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
            Employee::where('EmployeeID', '=', $id)->delete();
            
            return redirect('employee')->with('pesan_sukses', 'Data karyawan berhasil dihapus.');
        }
        catch(\Exception $e) {
            return redirect('employee')->with('pesan_gagal', $e->getMessage());
        }
    }
}
