@extends('layouts.master')

@section('konten')
    @include('produk._breadcrumb')
        <li class="active">Tambah Produk</li>
    </ol>

    <h1>Add New Product</h1>

    <form method="POST" action="{{ route('product.store') }}" class="form-horizontal">
        @include('produk._form')
    </form>
@endsection