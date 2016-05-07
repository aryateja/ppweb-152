@extends('layouts.master')

@section('konten')
    @include('pemesanan._breadcrumb')
        <li class="active">Detil Pemesanan</li>
    </ol>

    <h1>Order ID: #{{ $order->getKey() }}</h1>

    <div class="row">
        <div class="col-md-4">
            <dl class="dl-horizontal">
                <dt>Customer</dt>
                <dd>{{ $order->purchased_by->CompanyName }}</dd>

                <dt>Issued By</dt>
                <dd>{{ $order->issued_by->full_name }}</dd>

                <dt>Order Date</dt>
                <dd>{{ $order->OrderDate }}</dd>

                <dt>Required Date</dt>
                <dd>{{ $order->RequiredDate }}</dd>

                <dt>Shipped Date</dt>
                <dd>{{ $order->ShippedDate }}</dd>

                <dt>Freight (Kg)</dt>
                <dd>{{ $order->Freight }}</dd>

                <dt>Ship Via</dt>
                <dd>{{ $order->shipped_by->CompanyName }}</dd>
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
            <tr>
                <th>No.</th>
                <th>Product Name</th>
                <th>Unit Price ($)</th>
                <th>Quantity (pcs)</th>
                <th>Discount</th>
                <th>Subtotal ($)</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>{Total Qty}</td>
                <td></td>
                <td>{Grand Total}</td>
            </tr>
        </tfoot>
        <tbody>
            <?php $i = 1; ?>
            @foreach($order->purchased_products as $product)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>{{ $product->ProductName }}</td>
                    <td>{{ $product->pivot->UnitPrice }}</td>
                    <td>{{ $product->pivot->Quantity }}</td>
                    <td>{{ $product->pivot->Discount }}</td>
                    <td>
                        {{ ($product->pivot->UnitPrice * $product->pivot->Quantity) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span> Hapus
    </a>
@endsection