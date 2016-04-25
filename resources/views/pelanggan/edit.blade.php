@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/customer">Pelanggan</a></li>
        <li class="active">Detil Pelanggan</li>
    </ol>

    <h1>Pelanggan ID: {{ $customer->CustomerID }}</h1>

    <form method="POST" action="/customer/{{ $customer->CustomerID }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('pelanggan._form')
    </form>
@endsection