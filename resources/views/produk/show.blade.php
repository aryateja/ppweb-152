@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/product">Produk</a></li>
        <li class="active">Detil Produk</li>
    </ol>

    <h1>{{ $product->ProductName }}</h1>

    <dl class="dl-horizontal">
        <dt>Product Name</dt>
        <dd>{{ $product->ProductName }}</dd>

        <dt>Supplier</dt>
        <dd>PT. {{ $product->CompanyName }}</dd>

        <dt>Category</dt>
        <dd>{{ $product->CategoryName }}</dd>

        <dt>Quantity Per Unit</dt>
        <dd>{{ $product->QuantityPerUnit }}</dd>

        <dt>Unit Price ($)</dt>
        <dd>{{ $product->UnitPrice }}</dd>

        <dt>Units In Stock</dt>
        <dd>{{ $product->UnitsInStock }} pcs</dd>

        <dt>Units On Order</dt>
        <dd>{{ $product->UnitsOnOrder }} pcs</dd>

        <dt>Reorder Level</dt>
        <dd>{{ $product->ReorderLevel }} pcs</dd>

        <dt>Discontinued ?</dt>
        <dd>
            @if ($product->Discontinued)
                OUT OF ORDER
            @else
                CONTINUE
            @endif
        </dd>
    </dl>

    <a class="btn btn-default">
        <span class="glyphicon glyphicon-pencil"></span> Ubah
    </a> 

    <a class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span> Hapus
    </a>
@endsection