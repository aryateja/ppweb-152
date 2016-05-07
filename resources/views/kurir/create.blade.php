@extends('layouts.master')

@section('konten')
    @include('kurir._breadcrumb')
        <li class="active">Tambah Kurir</li>
    </ol>

    <h1>Add New Shipper</h1>

    <form method="POST" action="{{ route('shipper.store') }}" class="form-horizontal">
        @include('kurir._form')
    </form>
@endsection