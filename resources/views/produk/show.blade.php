@extends('layouts.master')

@section('konten')
    @include('produk._breadcrumb')
        <li class="active">Detil Produk</li>
    </ol>

    <h1>{{ $product->ProductName }}</h1>

    <dl class="dl-horizontal">
        <dt>Product Name</dt>
        <dd>{{ $product->ProductName }}</dd>

        <dt>Supplier</dt>
        <dd>{{ $product->supplier->CompanyName }}</dd>

        <dt>Category</dt>
        <dd>{{ $product->CategoryName }}</dd>

        <dt>Quantity Per Unit</dt>
        <dd>{{ $product->QuantityPerUnit }}</dd>

        <dt>Unit Price ($)</dt>
        <dd>{{ $product->UnitPrice }}</dd>

        <dt>Units In Stock</dt>
        <dd>{{ $product->UnitsInStock }}</dd>

        <dt>Units On Order</dt>
        <dd>{{ $product->UnitsOnOrder }}</dd>

        <dt>Reorder Level</dt>
        <dd>{{ $product->ReorderLevel }}</dd>

        <dt>Discontinued ?</dt>
        <dd>
            @if ($product->Discontinued)
                OUT OF ORDER
            @else
                CONTINUE
            @endif
        </dd>
    </dl>

    <a href="{{ route('product.edit', $product->getKey()) }}" class="btn btn-default" data-toggle="tooltip" title="Ubah Data">
        <span class="glyphicon glyphicon-pencil"></span> Ubah
    </a> 

    <form method="POST" action="{{ route('product.destroy', $product->getKey()) }}" style="display: inline;">
        {{ method_field('DELETE') }}

        <button type="submit" class="btn btn-danger delete-confirm" data-toggle="tooltip" title="Hapus Data">
            <span class="glyphicon glyphicon-trash"></span> Hapus
        </button>
    </form>
@endsection