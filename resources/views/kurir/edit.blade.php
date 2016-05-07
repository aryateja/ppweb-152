@extends('layouts.master')

@section('konten')
    @include('kurir._breadcrumb')
        <li class="active">Ubah Kurir</li>
    </ol>

    <h1>Shipper ID: {{ $shipper->getKey() }}</h1>

    <form method="POST" action="{{ route('shipper.update', $shipper->getKey()) }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('kurir._form')
    </form>
@endsection