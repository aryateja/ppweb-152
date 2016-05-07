@extends('layouts.master')

@section('konten')
    <h1>
        Customers
        <a href="{{ route('customer.create') }}" class="btn btn-primary">Add New</a>
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
                    <td>
                        <?php echo ($i++ + ($customers->currentPage() * $customers->perPage()) - $customers->perPage()); ?>
                    </td>
                    <td>
                        <a href="{{ route('customer.show', $customer->getKey()) }}">
                            {{ $customer->getKey() }}
                        </a>
                    </td>
                    <td>{{ $customer->company_name_formatted }}</td>
                    <td>{{ $customer->ContactName }}</td>
                    <td>{{ $customer->Phone }}</td>
                    <td>{{ $customer->Fax }}</td>
                    <td>
                        <a href="{{ route('customer.edit', $customer->getKey()) }}" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <form method="POST" action="{{ route('customer.destroy', $customer->getKey()) }}" style="display: inline;">
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

    <div class="pull-right">{!! $customers->links() !!}</div>
@endsection