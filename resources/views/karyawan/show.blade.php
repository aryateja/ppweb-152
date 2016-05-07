@extends('layouts.master')

@section('konten')
    @include('karyawan._breadcrumb')
        <li class="active">Detil Karyawan</li>
    </ol>

    <h1>{{ $employee->full_name }}</h1>

    <dl class="dl-horizontal">
        <dt>Title</dt>
        <dd>{{ $employee->Title }}</dd>

        <dt>Birth Date</dt>
        <dd>{{ $employee->BirthDate }}</dd>

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

    <a href="{{ route('employee.edit', $employee->getKey()) }}" class="btn btn-default" data-toggle="tooltip" title="Ubah Data">
        <span class="glyphicon glyphicon-pencil"></span> Ubah
    </a> 

    <form method="POST" action="{{ route('employee.destroy', $employee->getKey()) }}" style="display: inline;">
        {{ method_field('DELETE') }}

        <button type="submit" class="btn btn-danger delete-confirm" data-toggle="tooltip" title="Hapus Data">
            <span class="glyphicon glyphicon-trash"></span> Hapus
        </button>
    </form>
@endsection