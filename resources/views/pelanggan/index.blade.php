@extends('layouts.master')

@section('konten')
    <h1>Customers</h1>

    <table class="table table-condensed table-hover">
        <thead>
            <th>No.</th>
            <th>ID Pelanggan</th>
            <th>Nama Perusahaan</th>
            <th>Contact Person</th>
            <th>No. Telp</th>
            <th>No. Fax</th>
            <th></th>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($customers as $customer)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>
                        <a href="customer/{{ $customer->CustomerID }}/show">
                            {{ $customer->CustomerID }}
                        </a>
                    </td>
                    <td>PT. {{ $customer->CompanyName }}</td>
                    <td>{{ $customer->ContactName }}</td>
                    <td>{{ $customer->Phone }}</td>
                    <td>{{ $customer->Fax }}</td>
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