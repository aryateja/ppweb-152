@extends('layouts.master')

@section('konten')
    @include('karyawan._breadcrumb')
        <li class="active">Detil Karyawan</li>
    </ol>

    <h1>Employee ID: {{ $employee->EmployeeID }}</h1>

    <form method="POST" action="{{ route('employee.update', $employee->EmployeeID) }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('karyawan._form')
    </form>
@endsection