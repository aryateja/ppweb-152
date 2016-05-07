@extends('layouts.master')

@section('konten')
    <h1>
        Suppliers
        <a href="{{ route('supplier.create') }}" class="btn btn-primary">Add New</a>
    </h1>

    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Perusahaan</th>
                <th>Contact Person</th>
                <th>No. Telp</th>
                <th>No. Fax</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($suppliers as $supplier)
                <tr>
                    <td>
                        <?php echo ($i++ + ($suppliers->currentPage() * $suppliers->perPage()) - $suppliers->perPage()); ?>
                    </td>
                    <td>
                        <a href="{{ route('supplier.show', $supplier->getKey()) }}">
                            {{ $supplier->company_name_formatted }}
                        </a>
                    </td>
                    <td>{{ $supplier->ContactName }}</td>
                    <td>{{ $supplier->Phone }}</td>
                    <td>{{ $supplier->Fax }}</td>
                    <td>
                        <a href="{{ route('supplier.edit', $supplier->getKey()) }}" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <form method="POST" action="{{ route('supplier.destroy', $supplier->getKey()) }}" style="display: inline;">
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

    <div class="pull-right">{!! $suppliers->links() !!}</div>
@endsection