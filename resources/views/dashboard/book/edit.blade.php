@extends('layouts.dashboard')
@section('title', 'Admin | Edit Buku')
    
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Edit Buku</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('book.update', $b->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="category_book_id" class="form-label">Kategori</label>
                                <select name="category_book_id" id="category_book_id" class="form-control @error('category_book_id') is-invalid @enderror">
                                    <option selected hidden>Pilih Kategori</option>
                                    @foreach ($category_books as $cb)
                                        @if ($b->category_book_id == $cb->id)
                                            <option value="{{ $cb->id }}" selected>{{ $cb->nama_kategori }}</option>
                                        @else
                                            <option value="{{ $cb->id }}">{{ $cb->nama_kategori }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_book_id')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" value="{{ $b->judul }}" id="judul" class="form-control @error('judul') is-invalid @enderror">
                                @error('judul')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" value="{{ $b->penerbit }}" id="penerbit" class="form-control @error('penerbit') is-invalid @enderror">
                                @error('penerbit')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="pengarang" class="form-label">Pengarang</label>
                                <input type="text" name="pengarang" value="{{ $b->pengarang }}" id="pengarang" class="form-control @error('pengarang') is-invalid @enderror">
                                @error('pengarang')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" name="tahun" value="{{ $b->tahun }}" id="tahun" class="form-control @error('tahun') is-invalid @enderror">
                                @error('tahun')
                                    <div class="alert alert-danger mb-2 mt-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="lokasi" class="form-label">Lokasi / Rak</label>
                                <input type="text" name="lokasi" value="{{ $b->lokasi }}" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror" placeholder="Input Lokasi / Rak Buku">
                                @error('lokasi')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" name="stok" value="{{ $b->stok }} id="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Input Stok">
                                @error('stok')
                                    <div class="alert alert-danger mb-2 mt-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control @error('keterangan') is-invalid @enderror)" placeholder="Input Keterangan">{{ $b->keterangan }}</textarea>
                            </div>
                            @error('keterangan')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary float-end">Update</button>
                                <a href="{{ route('book.index') }}" class="btn btn-secondary float-end me-3">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection