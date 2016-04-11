@extends('layouts.master')

@section('konten')
    <h1>
        Categories
        <a href="category/create" class="btn btn-primary">Add New</a>
    </h1>

    <table class="table table-condensed table-hover">
        <thead>
            <th>No.</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th></th>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($categories as $category)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>{{ $category->CategoryName }}</td>
                    <td>{{ $category->Description }}</td>
                    <td>
                        <a href="/category/{{ $category->CategoryID }}/edit" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <form method="POST" action="category/{{ $category->CategoryID }}" style="display: inline;">
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger btn-xs delete-confirm" data-toggle="tooltip" title="Hapus Data">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection