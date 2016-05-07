@extends('layouts.master')

@section('konten')
    @include('pemasok._breadcrumb')
        <li class="active">Detil Pemasok</li>
    </ol>

    <h1>Pemasok ID: {{ $supplier->getKey() }}</h1>

    <form method="POST" action="{{ route('supplier.update', $supplier->getKey()) }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('pemasok._form')
    </form>
@endsection