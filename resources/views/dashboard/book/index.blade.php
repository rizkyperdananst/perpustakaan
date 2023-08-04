@extends('layouts.dashboard')
@section('title', 'Admin | Data Buku')
    
@section('content')
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
                    <a href="{{ route('book.create') }}" class="btn btn-primary float-end ms-3">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Stok</th>
                                    <th>Siswa Yang Meminjam</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no= 1;
                                @endphp
                                @foreach ($bukuDenganPeminjam as $b)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><img src="{{ url('storage/cover-books/', $b->image) }}" width="150" alt="" class="img img-fluid img-thumbnail border-dark"></td>
                                    <td>{{ $b->category_books->nama_kategori }}</td>
                                    <td>{{ $b->judul }}</td>
                                    <td>{{ $b->penerbit }}</td>
                                    <td>{{ $b->pengarang }}</td>
                                    <td>{{ $b->stok }}</td>
                                    <td>
                                        @forelse ($b->peminjaman as $peminjaman)
                                        <ul>
                                            <li>{{ $peminjaman->students->nama }}</li>
                                        </ul>
                                        @empty
                                        <ul>
                                            <li>-</li>
                                        </ul>
                                        @endforelse
                                    </td>
                                    {{-- <td>{{ $b->peminjaman->students->nama }}</td> --}}
                                    <td width="19%">
                                        <a href="{{ route('book.show', $b->id) }}" class="btn btn-info">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('book.edit', $b->id) }}" class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('book.destroy', $b->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
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
@endsection