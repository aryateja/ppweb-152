@extends('layouts.master')

@section('konten')
    <h1>Products</h1>

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
                        <a class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <a class="btn btn-danger btn-xs" data-toggle="tooltip" title="Hapus Data">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection