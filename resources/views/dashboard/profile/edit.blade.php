@extends('layouts.dashboard')
@section('title', 'Admin | Edit Profile')
    
@section('content')
    <div class="container">
        <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row mb-3">
                <div class="col-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ $profile->nama }}" id="nama" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="pendiri" class="form-label">Pendiri</label>
                    <input type="text" name="pendiri" value="{{ $profile->pendiri }}" id="pendiri" class="form-control @error('pendiri') is-invalid @enderror">
                    @error('pendiri')
                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="tahun" class="form-label">Berdiri</label>
                    <input type="text" name="tahun" value="{{ $profile->tahun }}" id="tahun" class="form-control @error('tahun') is-invalid @enderror">
                    @error('tahun')
                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
                    <input type="text" name="penanggung_jawab" value="{{ $profile->penanggung_jawab }}" id="penanggung_jawab" class="form-control @error('penanggung_jawab') is-invalid @enderror">
                    @error('penanggung_jawab')
                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="profile" class="form-label">Profile</label>
                    <input type="file" name="profile" value="{{ $profile->profile }}" id="profile" class="form-control @error('profile') is-invalid @enderror">
                    @error('profile')
                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <button class="btn btn-info float-end ms-3">Edit Profile</button>
                    <a href="{{ route('profile.index') }}" class="btn btn-warning float-end">Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection