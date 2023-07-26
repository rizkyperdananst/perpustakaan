@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Absensi')
    
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Absensi Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('attendance.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Input Nama">
                                    @error('nama')
                                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="number" name="npm" id="npm" class="form-control @error('npm') is-invalid @enderror" placeholder="Input NPM">
                                    @error('npm')
                                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror" placeholder="Input Kelas">
                                    @error('kelas')
                                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="jam" class="form-label">Jam</label>
                                    <input type="text" name="jam" value="{{ $time }}" id="jam" class="form-control @error('jam') is-invalid @enderror" readonly>
                                    @error('jam')
                                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="text" name="tanggal" value="{{ $tanggal }}" id="tanggal" class="form-control @error('tanggal') is-invalid  @enderror" readonly>
                                    @error('tanggal')
                                        <div class="alert alert-danger mt-2 mb-2 m-p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" value="{{ $keterangan }}" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" readonly>
                                    @error('keterangan')
                                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <button class="btn btn-info float-end ms-3">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let tanggal = document.getElementById('tanggal');
            let time = time();
            
        </script>
    @endpush
@endsection