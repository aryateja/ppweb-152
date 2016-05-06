@extends('layouts.master')

@section('konten')
    @include('produk._breadcrumb')
        <li class="active">Ubah Produk</li>
    </ol>

    <h1>Produk ID: {{ $product->ProductID }}</h1>

    <form method="POST" action="{{ route('product.show', $product->ProductID) }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('produk._form')
    </form>
@endsection