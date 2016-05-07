@extends('layouts.master')

@section('konten')
    @include('pelanggan._breadcrumb')
        <li class="active">Detil Pelanggan</li>
    </ol>

    <h1>Add New Customer</h1>

    <form method="POST" action="{{ route('customer.store') }}" class="form-horizontal">
        @include('pelanggan._form')
    </form>
@endsection