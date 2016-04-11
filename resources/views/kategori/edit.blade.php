@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/category">Kategori</a></li>
        <li class="active">Ubah Kategori</li>
    </ol>

    <h1>Kategori ID: {{ $category->CategoryID }}</h1>

    <form method="POST" action="/category/{{ $category->CategoryID }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('kategori._form')
    </form>
@endsection