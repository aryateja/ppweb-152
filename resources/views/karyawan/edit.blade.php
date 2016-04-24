@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/employee">Karyawan</a></li>
        <li class="active">Detil Karyawan</li>
    </ol>

    <h1>Employee ID: {{ $employee->EmployeeID }}</h1>

    <form method="POST" action="/employee/{{ $employee->EmployeeID }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('karyawan._form')
    </form>
@endsection