@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/shipper">Kurir</a></li>
        <li class="active">Ubah Kurir</li>
    </ol>

    <h1>Shipper ID: {{ $shipper->ShipperID }}</h1>

    <form method="POST" action="/shipper/{{ $shipper->ShipperID }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('kurir._form')
    </form>
@endsection