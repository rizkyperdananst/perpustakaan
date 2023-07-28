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
                <form action="{{ route('user-student.update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" id="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" id="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" value="{{ Auth::user()->status }}" id="status" class="form-control @error('status') is-invalid @enderror" readonly>
                            @error('status')
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