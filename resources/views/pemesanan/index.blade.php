@extends('layouts.master')

@section('konten')
    <h1>
        Orders
        <a href="order/create" class="btn btn-primary">Add New</a>
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
                        <a href="order/{{ $order->OrderID }}">
                            #{{ $order->OrderID }}
                        </a>
                    </td>
                    <td>
                        <span data-toggle="tooltip" data-placement="right" title="PT. {{ $order->CompanyName }}">
                            <abbr title="ID Pelanggan">{{ $order->CustomerID }}</abbr>
                        </span>
                    </td>
                    <td>{{ date_format(date_create($order->OrderDate), 'd-F-Y') }}</td>
                    <td>{{ date_format(date_create($order->ShippedDate), 'd-F-Y') }}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#myModal-{{ $order->EmployeeID }}">
                            {{ $order->FirstName }} {{ $order->LastName }} <span class="glyphicon glyphicon-modal-window"></span>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="/order/{{ $order->OrderID }}" style="display: inline;">
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
    @foreach($employees as $employee)
        <!-- Modal -->
        <div class="modal fade" id="myModal-{{ $employee->EmployeeID }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">
                            {{ $employee->FirstName }} {{ $employee->LastName }}, {{ $employee->TitleOfCourtesy }}
                        </h3>
                    </div>

                    <div class="modal-body">
                        <dl class="dl-horizontal">
                            <dt>Title</dt>
                            <dd>{{ $employee->Title }}</dd>

                            <dt>Birth Date</dt>
                            <dd>{{ date_format(date_create($employee->BirthDate), 'd-F-Y') }}</dd>

                            <dt>Hire Date</dt>
                            <dd>{{ $employee->HireDate }}</dd>

                            <dt>Address</dt>
                            <dd>{{ $employee->Address }}</dd>

                            <dt>City</dt>
                            <dd>{{ $employee->City }}</dd>

                            <dt>Region</dt>
                            <dd>{{ $employee->Region }}</dd>

                            <dt>Postal Code</dt>
                            <dd>{{ $employee->PostalCode }}</dd>

                            <dt>Country</dt>
                            <dd>{{ $employee->Country }}</dd>

                            <dt>HomePhone</dt>
                            <dd>{{ $employee->HomePhone }} ext. {{ $employee->Extension }}</dd>

                            <dt>Reports To</dt>
                            <dd>{{ $employee->ReportsTo }}</dd>

                            <dt>Salary</dt>
                            <dd>{{ $employee->Salary }}</dd>

                            <dt>Notes</dt>
                            <dd>{{ $employee->Notes }}</dd>
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