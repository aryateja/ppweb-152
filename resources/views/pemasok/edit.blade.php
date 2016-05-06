@extends('layouts.master')

@section('konten')
    @include('pemasok._breadcrumb')
        <li class="active">Detil Pemasok</li>
    </ol>

    <h1>Pemasok ID: {{ $supplier->SupplierID }}</h1>

    <form method="POST" action="{{ route('supplier.update', $supplier->SupplierID) }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('pemasok._form')
    </form>
@endsection