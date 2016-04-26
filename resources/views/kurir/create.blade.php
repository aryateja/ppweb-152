@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/shipper">Kurir</a></li>
        <li class="active">Tambah Kurir</li>
    </ol>

    <h1>Add New Shipper</h1>

    <form method="POST" action="/shipper" class="form-horizontal">
        @include('kurir._form')
    </form>
@endsection