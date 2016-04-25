@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/customer">Pelanggan</a></li>
        <li class="active">Detil Pelanggan</li>
    </ol>

    <h1>Add New Customer</h1>

    <form method="POST" action="/customer" class="form-horizontal">
        @include('pelanggan._form')
    </form>
@endsection