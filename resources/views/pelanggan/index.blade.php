@extends('layouts.master')

@section('konten')
    <h1>
        Customers
        <a href="customer/create" class="btn btn-primary">Add New</a>
    </h1>

    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Pelanggan</th>
                <th>Nama Perusahaan</th>
                <th>Contact Person</th>
                <th>No. Telp</th>
                <th>No. Fax</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($customers as $customer)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>
                        <a href="customer/{{ $customer->CustomerID }}">
                            {{ $customer->CustomerID }}
                        </a>
                    </td>
                    <td>PT. {{ $customer->CompanyName }}</td>
                    <td>{{ $customer->ContactName }}</td>
                    <td>{{ $customer->Phone }}</td>
                    <td>{{ $customer->Fax }}</td>
                    <td>
                        <a href="/customer/{{ $customer->CustomerID }}/edit" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <form method="POST" action="/customer/{{ $customer->CustomerID }}" style="display: inline;">
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