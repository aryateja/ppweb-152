@extends('layouts.master')

@section('konten')
    <h1>
        Categories
        <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a>
    </h1>

    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($categories as $category)
                <tr>
                    <td>
                        <?php echo ($i++ + ($categories->currentPage() * $categories->perPage()) - $categories->perPage()); ?>
                    </td>
                    <td>{{ $category->CategoryName }}</td>
                    <td>{{ $category->Description }}</td>
                    <td>
                        <a href="{{ route('category.edit', $category->CategoryID) }}" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <form method="POST" action="{{ route('category.destroy', $category->CategoryID) }}" style="display: inline;">
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

    <div class="pull-right">{!! $categories->links() !!}</div>
@endsection