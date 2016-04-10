@extends('layouts.master')

@section('konten')
    <h1>Shippers</h1>

    <table class="table table-condensed table-hover">
        <thead>
            <th>No.</th>
            <th>Nama Perusahaan</th>
            <th>No. Telp</th>
            <th></th>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($shippers as $shipper)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>{{ $shipper->CompanyName }}</td>
                    <td>{{ $shipper->Phone }}</td>
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