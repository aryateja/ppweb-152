@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/order">Pemesanan</a></li>
        <li class="active">Detil Pemesanan</li>
    </ol>

    <h1>Order ID: #{{ $order->OrderID }}</h1>

    <div class="row">
        <div class="col-md-4">
            <dl class="dl-horizontal">
                <dt>Customer</dt>
                <dd>PT. {{ $order->CompanyName }}</dd>

                <dt>Issued By</dt>
                <dd>{{ $order->FirstName }} {{ $order->LastName }}, {{ $order->TitleOfCourtesy }}</dd>

                <dt>Order Date</dt>
                <dd>{{ date_format(date_create($order->OrderDate), 'F-d, Y') }}</dd>

                <dt>Required Date</dt>
                <dd>{{ date_format(date_create($order->RequiredDate), 'F-d, Y') }}</dd>

                <dt>Shipped Date</dt>
                <dd>{{ date_format(date_create($order->ShippedDate), 'F-d, Y') }}</dd>

                <dt>Freight (Kg)</dt>
                <dd>{{ $order->Freight }}</dd>

                <dt>Ship Via</dt>
                <dd>{{ $order->ShipVia }}</dd>
            </dl>
        </div>
        <div class="col-md-6">
            <dl class="dl-horizontal">
                <dt>Ship Name</dt>
                <dd>{{ $order->ShipName }}</dd>

                <dt>Ship Address</dt>
                <dd>{{ $order->ShipAddress }}</dd>

                <dt>Ship City</dt>
                <dd>{{ $order->ShipCity }}</dd>

                <dt>Ship Region</dt>
                <dd>{{ $order->ShipRegion }}</dd>

                <dt>Ship Postal Code</dt>
                <dd>{{ $order->ShipPostalCode }}</dd>

                <dt>Ship Country</dt>
                <dd>{{ $order->ShipCountry }}</dd>
            </dl>
        </div>
    </div><hr>

    <table class="table table-condensed table-striped">
        <thead>
            <th>No.</th>
            <th>Product Name</th>
            <th>Unit Price ($)</th>
            <th>Quantity (pcs)</th>
            <th>Discount</th>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($order_details as $order_detail)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>{{ $order_detail->ProductName }}</td>
                    <td>{{ $order_detail->UnitPrice }}</td>
                    <td>{{ $order_detail->Quantity }}</td>
                    <td>{{ $order_detail->Discount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span> Hapus
    </a>
@endsection