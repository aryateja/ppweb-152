@extends('layouts.master')

@section('konten')
    @include('pelanggan._breadcrumb')
        <li class="active">Detil Pelanggan</li>
    </ol>

    <h1>{{ $customer->CompanyName }}</h1>

    <dl class="dl-horizontal">
        <dt>Customer ID</dt>
        <dd>{{ $customer->CustomerID }}</dd>

        <dt>Contact Person</dt>
        <dd>{{ $customer->ContactName }}</dd>

        <dt>Title</dt>
        <dd>{{ $customer->ContactTitle }}</dd>

        <dt>Address</dt>
        <dd>{{ $customer->Address }}</dd>

        <dt>City</dt>
        <dd>{{ $customer->City }}</dd>

        <dt>Region</dt>
        <dd>{{ $customer->Region }}</dd>

        <dt>Postal Code</dt>
        <dd>{{ $customer->PostalCode }}</dd>

        <dt>Country</dt>
        <dd>{{ $customer->Country }}</dd>

        <dt>Phone</dt>
        <dd>{{ $customer->Phone }}</dd>

        <dt>Fax</dt>
        <dd>{{ $customer->Fax }}</dd>
    </dl>

    <a href="{{ route('customer.edit', $customer->getKey()) }}" class="btn btn-default" data-toggle="tooltip" title="Ubah Data">
        <span class="glyphicon glyphicon-pencil"></span> Ubah
    </a> 

    <form method="POST" action="{{ route('customer.destroy', $customer->getKey()) }}" style="display: inline;">
        {{ method_field('DELETE') }}

        <button type="submit" class="btn btn-danger delete-confirm" data-toggle="tooltip" title="Hapus Data">
            <span class="glyphicon glyphicon-trash"></span> Hapus
        </button>
    </form>
@endsection