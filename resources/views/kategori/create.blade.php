@extends('layouts.master')

@section('konten')
    @include('kategori._breadcrumb')
        <li class="active">Tambah Kategori</li>
    </ol>

    <h1>Add New Category</h1>

    <form method="POST" action="{{ route('category.store')  }}" class="form-horizontal">
        @include('kategori._form')
    </form>
@endsection