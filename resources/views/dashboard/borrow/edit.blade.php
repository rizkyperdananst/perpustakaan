@extends('layouts.dashboard')
@section('title', 'Admin | Edit Peminjaman')
    
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Edit Peminjaman</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('borrow.update', $b->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="student_id" class="form-label">Siswa</label>
                                <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror">
                                    <option selected hidden>Pilih Siswa</option>
                                    @foreach ($students as $student)
                                        @if ($b->student_id == $student->id)
                                            <option value="{{ $student->id }}" selected>{{ $student->nama }}</option>
                                        @else
                                            <option value="{{ $student->id }}">{{ $student->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="book_id" class="form-label">Buku</label>
                                <select name="book_id" id="book_id" class="form-control @error('book_id') is-invalid @enderror">
                                    <option selected hidden>Pilih Buku</option>
                                    @foreach ($books as $book)
                                        @if ($b->book_id == $book->id)
                                            <option value="{{ $book->id }}" selected>{{ $book->judul }}</option>
                                        @else
                                            <option value="{{ $book->id }}">{{ $book->judul }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('book_id')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="peminjaman" class="form-label">Peminjaman</label>
                                <input type="text" name="peminjaman" value="{{ $peminjaman }}" id="peminjaman" class="form-control @error('peminjaman') @enderror" readonly>
                                @error('peminjaman')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="pengembalian" class="form-label">Pengembalian</label>
                                <input type="text" name="pengembalian" value="{{ $pengembalian }}" id="pengembalian" class="form-control @error('pengembalian') @enderror" readonly>
                                @error('pengembalian')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="admin" class="form-label">Admin</label>
                                <select name="admin" id="admin" class="form-select @error('admin') is-invalid @enderror">
                                    <option selected hidden>Pilih Status Disetujui</option>
                                    @foreach ($disetujui as $d)
                                        @if ($b->admin == $d)
                                            <option value="{{ $d }}" selected>{{ $d }}</option>
                                        @else
                                            <option value="{{ $d }}">{{ $d }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('admin')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                    <option selected hidden>Ganti Status</option>
                                    @foreach ($status as $s)
                                        @if ($b->status == $s)
                                            <option value="{{ $s }}" selected>{{ $s }}</option>
                                        @else
                                            <option value="{{ $s }}">{{ $s }}</option>
                                        @endif
                                    @endforeach
                                </select>                                
                                @error('status')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary float-end ms-3">Update</button>
                                <a href="{{ route('borrow.index') }}" class="btn btn-secondary float-end">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection