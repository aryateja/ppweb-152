@extends('layouts.master')

@section('konten')
    <h1>Suppliers</h1>

    <table class="table table-condensed table-hover">
        <thead>
            <th>No.</th>
            <th>Nama Perusahaan</th>
            <th>Contact Person</th>
            <th>No. Telp</th>
            <th>No. Fax</th>
            <th></th>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($suppliers as $supplier)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>
                        <a href="supplier/{{ $supplier->SupplierID }}">
                            PT. {{ $supplier->CompanyName }}
                        </a>
                    </td>
                    <td>{{ $supplier->ContactName }}</td>
                    <td>{{ $supplier->Phone }}</td>
                    <td>{{ $supplier->Fax }}</td>
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