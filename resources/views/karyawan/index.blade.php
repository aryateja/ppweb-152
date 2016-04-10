@extends('layouts.master')

@section('konten')
    <h1>Employees</h1>

    <table class="table table-condensed table-hover">
        <thead>
            <th>No.</th>
            <th>Nama Lengkap</th>
            <th>Jabatan</th>
            <th>No. Telp</th>
            <th>Asal Negara</th>
            <th></th>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($employees as $employee)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>
                        <a href="employee/{{ $employee->EmployeeID }}/show">
                            {{ $employee->FirstName }} {{ $employee->LastName }}, {{ $employee->TitleOfCourtesy }}
                        </a>
                    </td>
                    <td>{{ $employee->Title }}</td>
                    <td>{{ $employee->HomePhone }}</td>
                    <td>{{ $employee->Country }}</td>
                    <td>
                        <a class="btn btn-default btn-xs" data-toggle="tooltip" title="Ubah Data">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 

                        <a class="btn btn-danger btn-xs" data-toggle="tooltip" title="Hapus Data">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection