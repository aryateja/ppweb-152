@extends('layouts.master')

@section('konten')
    <h1>
        Orders
        <a href="{{ route('order.create') }}" class="btn btn-primary">Add New</a>
    </h1>

    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Pemesanan</th>
                <th>ID Pelanggan</th>
                <th>Tanggal Pesan</th>
                <th>Tanggal Kirim</th>
                <th>Disetujui Oleh</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($orders as $order)
                <tr>
                    <td>
                        <?php echo ($i++ + ($orders->currentPage() * $orders->perPage()) - $orders->perPage()); ?>
                    </td>
                    <td>
                        <a href="{{ route('order.show', $order->getKey()) }}">
                            #{{ $order->getKey() }}
                        </a>
                    </td>
                    <td>
                        <span data-toggle="tooltip" data-placement="right" title="{{ $order->purchased_by->company_name_formatted }}">
                            <abbr title="ID Pelanggan">{{ $order->purchased_by->CustomerID }}</abbr>
                        </span>
                    </td>
                    <td>{{ $order->order_date_formatted }}</td>
                    <td>{{ $order->shipped_date_formatted }}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#myModal-{{ $order->EmployeeID }}">
                            {{ $order->issued_by->full_name }} <span class="glyphicon glyphicon-modal-window"></span>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('order.destroy', $order->getKey()) }}" style="display: inline;">
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger btn-xs delete-confirm" data-toggle="tooltip" title="Hapus Data">
                                <span class="glyphicon glyphicon-trash"></span> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right">{!! $orders->links() !!}</div>

    <!-- Modal -->
    @foreach($orders as $order)
        <div class="modal fade" id="myModal-{{ $order->issued_by->EmployeeID }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">
                            {{ $order->issued_by->full_name }}
                        </h3>
                    </div>

                    <div class="modal-body">
                        <dl class="dl-horizontal">
                            <dt>Title</dt>
                            <dd>{{ $order->issued_by->Title }}</dd>

                            <dt>Birth Date</dt>
                            <dd>{{ $order->issued_by->birth_date_formatted }}</dd>

                            <dt>Hire Date</dt>
                            <dd>{{ $order->issued_by->hire_date_formatted }}</dd>

                            <dt>Address</dt>
                            <dd>{{ $order->issued_by->Address }}</dd>

                            <dt>City</dt>
                            <dd>{{ $order->issued_by->City }}</dd>

                            <dt>Region</dt>
                            <dd>{{ $order->issued_by->Region }}</dd>

                            <dt>Postal Code</dt>
                            <dd>{{ $order->issued_by->PostalCode }}</dd>

                            <dt>Country</dt>
                            <dd>{{ $order->issued_by->Country }}</dd>

                            <dt>Phone</dt>
                            <dd>{{ $order->issued_by->phone }}</dd>

                            <dt>Reports To</dt>
                            <dd>{{ $order->issued_by->ReportsTo }}</dd>

                            <dt>Salary</dt>
                            <dd>{{ $order->issued_by->Salary }}</dd>

                            <dt>Notes</dt>
                            <dd>{{ $order->issued_by->Notes }}</dd>
                        </dl>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection