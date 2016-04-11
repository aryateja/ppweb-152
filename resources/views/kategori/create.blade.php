@extends('layouts.master')

@section('konten')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/category">Kategori</a></li>
        <li class="active">Tambah Kategori</li>
    </ol>

    <h1>Add New Category</h1>

    <form method="POST" action="/category" class="form-horizontal">
        @include('kategori._form')
    </form>
@endsection