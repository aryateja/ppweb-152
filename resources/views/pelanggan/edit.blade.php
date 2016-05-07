@extends('layouts.master')

@section('konten')
    @include('pelanggan._breadcrumb')
        <li class="active">Detil Pelanggan</li>
    </ol>

    <h1>Pelanggan ID: {{ $customer->getKey() }}</h1>

    <form method="POST" action="{{ route('customer.update', $customer->getKey()) }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('pelanggan._form')
    </form>
@endsection