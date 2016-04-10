@extends('layouts.master')

@section('konten')
    <h1>Orders</h1>

    <table class="table table-condensed table-hover">
        <thead>
            <th>No.</th>
            <th>ID Pemesanan</th>
            <th>ID Pelanggan</th>
            <th>Tanggal Pesan</th>
            <th>Tanggal Kirim</th>
            <th>Disetujui Oleh</th>
            <th></th>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($orders as $order)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>
                        <a href="order/{{ $order->OrderID }}/show">
                            #{{ $order->OrderID }}
                        </a>
                    </td>
                    <td>
                        <span data-toggle="tooltip" data-placement="right" title="PT. {{ $order->CompanyName }}">
                            {{ $order->CustomerID }}
                        </span>
                    </td>
                    <td>{{ date_format(date_create($order->OrderDate), 'd-F-Y') }}</td>
                    <td>{{ date_format(date_create($order->ShippedDate), 'd-F-Y') }}</td>
                    <td>{{ $order->FirstName }} {{ $order->LastName }}</td>
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