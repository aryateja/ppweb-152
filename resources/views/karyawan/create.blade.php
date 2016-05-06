@extends('layouts.master')

@section('konten')
    @include('karyawan._breadcrumb')
        <li class="active">Detil Karyawan</li>
    </ol>

    <h1>Add New Employee</h1>

    <form method="POST" action="{{ route('employee.store') }}" class="form-horizontal">
        @include('karyawan._form')
    </form>
@endsection