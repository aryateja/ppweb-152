@extends('layouts.master')

@section('konten')
    @include('pemasok._breadcrumb')
        <li class="active">Detil Pemasok</li>
    </ol>

    <h1>Add New Supplier</h1>

    <form method="POST" action="{{ route('supplier.store') }}" class="form-horizontal">
        @include('pemasok._form')
    </form>
@endsection