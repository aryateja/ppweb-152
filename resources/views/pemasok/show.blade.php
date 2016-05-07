@extends('layouts.master')

@section('konten')
    @include('pemasok._breadcrumb')
        <li class="active">Detil Pemasok</li>
    </ol>

    <h1>{{ $supplier->CompanyName }}</h1>

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

    <a href="{{ route('supplier.edit', $supplier->getKey()) }}" class="btn btn-default" data-toggle="tooltip" title="Ubah Data">
        <span class="glyphicon glyphicon-pencil"></span> Ubah
    </a> 

    <form method="POST" action="{{ route('supplier.destroy', $supplier->getKey()) }}" style="display: inline;">
        {{ method_field('DELETE') }}

        <button type="submit" class="btn btn-danger delete-confirm" data-toggle="tooltip" title="Hapus Data">
            <span class="glyphicon glyphicon-trash"></span> Hapus
        </button>
    </form>
@endsection