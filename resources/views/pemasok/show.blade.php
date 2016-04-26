@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/supplier">Pemasok</a></li>
        <li class="active">Detil Pemasok</li>
    </ol>

    <h1>PT. {{ $supplier->CompanyName }}</h1>

    <dl class="dl-horizontal">
        <dt>Contact Person</dt>
        <dd>{{ $supplier->ContactName }}</dd>

        <dt>Title</dt>
        <dd>{{ $supplier->ContactTitle }}</dd>

        <dt>Address</dt>
        <dd>{{ $supplier->Address }}</dd>

        <dt>City</dt>
        <dd>{{ $supplier->City }}</dd>

        <dt>Region</dt>
        <dd>{{ $supplier->Region }}</dd>

        <dt>Postal Code</dt>
        <dd>{{ $supplier->PostalCode }}</dd>

        <dt>Country</dt>
        <dd>{{ $supplier->Country }}</dd>

        <dt>Phone</dt>
        <dd>{{ $supplier->Phone }}</dd>

        <dt>Fax</dt>
        <dd>{{ $supplier->Fax }}</dd>

        <dt>Homepage</dt>
        <dd>{{ $supplier->HomePage }}</dd>
    </dl>

    <a href="/supplier/{{ $supplier->SupplierID }}/edit" class="btn btn-default" data-toggle="tooltip" title="Ubah Data">
        <span class="glyphicon glyphicon-pencil"></span> Ubah
    </a> 

    <form method="POST" action="/supplier/{{ $supplier->SupplierID }}" style="display: inline;">
        {{ method_field('DELETE') }}

        <button type="submit" class="btn btn-danger delete-confirm" data-toggle="tooltip" title="Hapus Data">
            <span class="glyphicon glyphicon-trash"></span> Hapus
        </button>
    </form>
@endsection