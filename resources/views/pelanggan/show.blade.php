@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/customer">Pelanggan</a></li>
        <li class="active">Detil Pelanggan</li>
    </ol>

    <h1>PT. {{ $customer->CompanyName }}</h1>

    <dl class="dl-horizontal">
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

    <a href="/customer/{{ $customer->CustomerID }}/edit" class="btn btn-default" data-toggle="tooltip" title="Ubah Data">
        <span class="glyphicon glyphicon-pencil"></span> Ubah
    </a> 

    <form method="POST" action="/customer/{{ $customer->CustomerID }}" style="display: inline;">
        {{ method_field('DELETE') }}

        <button type="submit" class="btn btn-danger delete-confirm" data-toggle="tooltip" title="Hapus Data">
            <span class="glyphicon glyphicon-trash"></span> Hapus
        </button>
    </form>
@endsection