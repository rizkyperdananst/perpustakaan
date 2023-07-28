@extends('layouts.dashboard-student')
@section('title', 'Admin | Detail Buku')
    
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h4>Detail Buku</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th>Image</th>
                                <td><img src="{{ url('storage/cover-books/', $b->image) }}" width="200" alt="" class="img img-fluid img-thumbnail border-dark"></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $b->category_books->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <th>Judul</th>
                                <td>{{ $b->judul }}</td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td>{{ $b->penerbit }}</td>
                            </tr>
                            <tr>
                                <th>Pengarang</th>
                                <td>{{ $b->pengarang }}</td>
                            </tr>
                            <tr>
                                <th>Tahun</th>
                                <td>{{ $b->tahun }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi / Rak</th>
                                <td>{{ $b->lokasi }}</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>{{ $b->stok }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $b->keterangan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer  d-flex justify-content-between">
                <a href="{{ route('book-student.create') }}" class="btn btn-primary">Pinjam Buku</a>
                <a href="{{ route('book.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection