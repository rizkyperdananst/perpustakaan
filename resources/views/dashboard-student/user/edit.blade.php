@extends('layouts.dashboard-student')
@section('title', 'Student | Edit Akun')
    
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h4>Edit Akun</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user-student.update', Auth::guard('student')->user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" value="{{ Auth::guard('student')->user()->nama }}" id="nama" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="number" name="nis" value="{{ Auth::guard('student')->user()->nis }}" id="nis" class="form-control @error('nis') is-invalid @enderror">
                            @error('nis')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" value="{{ Auth::guard('student')->user()->kelas }}" id="kelas" class="form-control @error('kelas') is-invalid @enderror" readonly>
                            @error('kelas')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="email" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password atau kosongkan">
                            @error('password')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <a href="{{ route('user-student.index') }}" class="btn btn-secondary float-end ms-3">Kembali</a>
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection