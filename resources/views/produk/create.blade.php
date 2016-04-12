@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/product">Produk</a></li>
        <li class="active">Tambah Produk</li>
    </ol>

    <h1>Add New Product</h1>

    <form method="POST" action="/product" class="form-horizontal">
        @include('produk._form')
    </form>
@endsection