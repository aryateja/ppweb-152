@extends('layouts.master')

@section('konten')
    <h1>
        Products
        <a href="{{ route('product.create') }}" class="btn btn-primary">Add New</a>
    </h1>

    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Isi per Unit</th>
                <th>Stok (pcs)</th>
                <th>Harga ($)</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($products as $product)
                <tr>
                    <td>
                        <?php echo ($i++ + ($products->currentPage() * $products->perPage()) - $products->perPage()); ?>
                    </td>
                    <td>
                        <a href="{{ route('product.show', $product->getKey()) }}">
                            {{ $product->ProductName }}
                        </a>
                    </td>
                    <td>{{ $product->category->CategoryName }}</td>
                    <td>{{ $product->QuantityPerUnit }}</td>
                    <td>{{ $product->units_in_stock_formatted }}</td>
                    <td>{{ $product->unit_price_formatted }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->getKey()) }}" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <form method="POST" action="{{ route('product.destroy', $product->getKey()) }}" style="display: inline;">
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger btn-xs delete-confirm" data-toggle="tooltip" title="Hapus Data">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right">{!! $products->links() !!}</div>
@endsection