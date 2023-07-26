@extends('layouts.dashboard')
@section('title', 'Admin | Data Kategori Buku')

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
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data Kategori Buku</h4>
                    <a href="{{ route('category-book.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no= 1;
                                @endphp
                                @foreach ($category_books as $cb)           
                                <tr>
                                    <td width="5%">{{ $no++ }}</td>
                                    <td>{{ $cb->nama_kategori }}</td>
                                    <td width="18%">
                                        <a href="{{ route('category-book.edit', $cb->id) }}" class="btn btn-warning">
                                            {{-- <i class="fa-regular fa-pen-to-square"></i> --}}
                                            Edit
                                        </a>
                                        <form action="{{ route('category-book.destroy', $cb->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
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