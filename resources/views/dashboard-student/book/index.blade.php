@extends('layouts.dashboard-student')
@section('title', 'Admin | Data Buku')
    
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
    <div class="row mb-3">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header ">
                    <h5 class="float-start">Data Buku</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Judul</th>
                                    <th>Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no= 1;
                                @endphp
                                @foreach ($books as $b)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><img src="{{ url('storage/cover-books/', $b->image) }}" width="150" alt="" class="img img-fluid img-thumbnail border-dark"></td>
                                    <td>{{ $b->judul }}</td>
                                    <td>{{ $b->penerbit }}</td>
                                    <td>{{ $b->pengarang }}</td>
                                    <td>{{ $b->stok }}</td>
                                    <td width="7%%">
                                        <a href="{{ route('book-student.show', $b->id) }}" class="btn btn-info">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
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