@extends('layouts.master')

@section('konten')
    <h1>
        Products
        <a href="product/create" class="btn btn-primary">Add New</a>
    </h1>

    <table class="table table-condensed table-hover">
        <thead>
            <th>No.</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Isi per Unit</th>
            <th>Stok (pcs)</th>
            <th>Harga ($)</th>
            <th></th>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($products as $product)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>
                        <a href="product/{{ $product->ProductID }}/show">
                            {{ $product->ProductName }}
                        </a>
                    </td>
                    <td>{{ $product->CategoryName }}</td>
                    <td>{{ $product->QuantityPerUnit }}</td>
                    <td>{{ $product->UnitsInStock }}</td>
                    <td>{{ $product->UnitPrice }}</td>
                    <td>
                        <a href="/product/{{ $product->ProductID }}/edit" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <form method="POST" action="/product/{{ $product->ProductID }}" style="display: inline;">
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
@endsection