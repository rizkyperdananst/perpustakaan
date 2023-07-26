@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Kategori Buku')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Tambah Kategori Buku</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('category-book.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="nama_kategori" class="form-label">Kategori Buku</label>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan Kategori Buku">
                                @error('nama_kategori')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary float-end ms-3">Tambah</button>
                        <a href="{{ route('category-book.index') }}" class="btn btn-secondary float-end">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</div>
    
@endsection