@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/supplier">Pemasok</a></li>
        <li class="active">Detil Pemasok</li>
    </ol>

    <h1>Pemasok ID: {{ $supplier->SupplierID }}</h1>

    <form method="POST" action="/supplier/{{ $supplier->SupplierID }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('pemasok._form')
    </form>
@endsection