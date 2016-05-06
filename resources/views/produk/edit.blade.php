@extends('layouts.master')

@section('konten')
    @include('produk._breadcrumb')
        <li class="active">Ubah Produk</li>
    </ol>

    <h1>Produk ID: {{ $product->getKey() }}</h1>

    <form method="POST" action="{{ route('product.update', $product->getKey()) }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('produk._form')
    </form>
@endsection