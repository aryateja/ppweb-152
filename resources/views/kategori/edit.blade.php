@extends('layouts.master')

@section('konten')
    @include('kategori._breadcrumb')
        <li class="active">Ubah Kategori</li>
    </ol>

    <h1>Kategori ID: {{ $category->CategoryID }}</h1>

    <form method="POST" action="{{ route('category.update', $category->CategoryID) }}" class="form-horizontal">
        {{ method_field('PATCH') }}

        @include('kategori._form')
    </form>
@endsection