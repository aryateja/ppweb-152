@extends('layouts.master')

@section('konten')
    <h1>
        Shippers
        <a href="{{ route('shipper.create') }}" class="btn btn-primary">Add New</a>
    </h1>

    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Perusahaan</th>
                <th>No. Telp</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($shippers as $shipper)
                <tr>
                    <td>
                        <?php echo ($i++ + ($shippers->currentPage() * $shippers->perPage()) - $shippers->perPage()); ?>
                    </td>
                    <td>{{ $shipper->CompanyName }}</td>
                    <td>{{ $shipper->Phone }}</td>
                    <td>
                        <a href="{{ route('shipper.edit', $shipper->getKey()) }}" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <form method="POST" action="{{ route('shipper.destroy', $shipper->getKey()) }}" style="display: inline;">
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

    <div class="pull-right">{!! $shippers->links() !!}</div>
@endsection