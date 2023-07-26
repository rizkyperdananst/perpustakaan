@extends('layouts.dashboard')
@section('title', 'Admin | Data Siswa')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="fw-bold">Data Siswa</h4>
                        <a href="{{ route('student.create') }}" class="btn btn-primary ms-3 mb-2">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>Kelas</th>
                                        <th width="13%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no= 1;
                                    @endphp
                                    @foreach ($students as $s)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ $s->nis }}</td>
                                        <td>{{ $s->kelas }}</td>
                                        <td width="14%">
                                            <a href="{{ route('student.edit', $s->id) }}" class="btn btn-warning">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('student.destroy', $s->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection