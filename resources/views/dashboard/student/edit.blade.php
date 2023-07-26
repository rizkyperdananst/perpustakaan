@extends('layouts.dashboard')
@section('title', 'Admin | Edit Siswa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Edit Siswa</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.update', $s->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" value="{{ $s->nama }}" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Input nama">
                                @error('nama')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="number" name="nis" value="{{ $s->nis }}" id="nis" class="form-control @error('nis') is-invalid @enderror" placeholder="Input NIS">
                                @error('nis')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" name="kelas" value="{{ $s->kelas }}" id="kelas" class="form-control @error('kelas') is-invalid @enderror" placeholder="Input Kelas">
                                @error('kelas')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-end ms-3">Update</button>
                                <a href="{{ route('student.index') }}" class="btn btn-secondary float-end">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection