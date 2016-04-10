@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/employee">Karyawan</a></li>
        <li class="active">Detil Karyawan</li>
    </ol>

    <h1>{{ $employee->TitleOfCourtesy }} {{ $employee->FirstName }} {{ $employee->LastName }}</h1>

    <dl class="dl-horizontal">
        <dt>Title</dt>
        <dd>{{ $employee->Title }}</dd>

        <dt>Birth Date</dt>
        <dd>{{ date_format(date_create($employee->BirthDate), 'd-F-Y') }}</dd>

        <dt>Hire Date</dt>
        <dd>{{ $employee->HireDate }}</dd>

        <dt>Address</dt>
        <dd>{{ $employee->Address }}</dd>

        <dt>City</dt>
        <dd>{{ $employee->City }}</dd>

        <dt>Region</dt>
        <dd>{{ $employee->Region }}</dd>

        <dt>Postal Code</dt>
        <dd>{{ $employee->PostalCode }}</dd>

        <dt>Country</dt>
        <dd>{{ $employee->Country }}</dd>

        <dt>HomePhone</dt>
        <dd>{{ $employee->HomePhone }} ext. {{ $employee->Extension }}</dd>

        <dt>Reports To</dt>
        <dd>{{ $employee->ReportsTo }}</dd>

        <dt>Salary</dt>
        <dd>{{ $employee->Salary }}</dd>

        <dt>Notes</dt>
        <dd>{{ $employee->Notes }}</dd>
    </dl>

    <a class="btn btn-default">
        <span class="glyphicon glyphicon-pencil"></span> Ubah
    </a> 

    <a class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span> Hapus
    </a>
@endsection