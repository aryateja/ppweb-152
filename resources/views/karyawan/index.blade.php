@extends('layouts.master')

@section('konten')
    <h1>
        Employees
        <a href="employee/create" class="btn btn-primary">Add New</a>
    </h1>

    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>No. Telp</th>
                <th>Asal Negara</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($employees as $employee)
                <tr>
                    <td>
                        <?php echo ($i++ + ($employees->currentPage() * $employees->perPage()) - $employees->perPage()); ?>
                    </td>
                    <td>
                        <a href="employee/{{ $employee->EmployeeID }}">
                            {{ $employee->FirstName }} {{ $employee->LastName }}, {{ $employee->TitleOfCourtesy }}
                        </a>
                    </td>
                    <td>{{ $employee->Title }}</td>
                    <td>{{ $employee->HomePhone }}</td>
                    <td>{{ $employee->Country }}</td>
                    <td>
                        <a href="/employee/{{ $employee->EmployeeID }}/edit" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <form method="POST" action="/employee/{{ $employee->EmployeeID }}" style="display: inline;">
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

    <div class="pull-right">{!! $employees->links() !!}</div>
@endsection