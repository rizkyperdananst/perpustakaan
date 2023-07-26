@extends('layouts.dashboard')
@section('title', 'Admin | Data User')
    
@section('content')
<div class="container">
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
                    <h4 class="fw-bold">Data User</h4>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($users as $u)                                    
                                <tr>
                                    <td width="5%">{{ $no++ }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->status }}</td>
                                    <td width="14%">
                                        <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form action="#" method="POST" class="d-inline">
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