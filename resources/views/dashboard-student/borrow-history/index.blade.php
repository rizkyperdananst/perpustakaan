@extends('layouts.dashboard-student')
@section('title', 'Admin | Riwayat Peminjaman')
    
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
    {{-- <div class="row mt-3 mb-3">
        <div class="col-md-12">
            @if ($status)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h5>Silahkan tunggu sampai <b>Admin</b> menyetujui peminjaman buku Anda!</h5>
            </div>
            @else
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5><b>Admin</b> sudah menyetujui, silahkan ambil buku yang anda pinjam di perpustakaan!</h5>
            </div>
            @endif
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <h5>Riwayat Peminjaman Anda</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama SIswa</th>
                                    <th>Judul Buku</th>
                                    <th>Peminjaman</th>
                                    <th>Pengembalian</th>
                                    <th>Disetujui</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no= 1;
                                @endphp
                                @foreach ($borrow_history as $bh)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $bh->students->nama }}</td>
                                    <td>{{ $bh->books->judul }}</td>
                                    <td>{{ $bh->peminjaman }}</td>
                                    <td>{{ $bh->pengembalian }}</td>
                                    @if ($bh->admin === 'Belum Disetujui')
                                    <td><span class="bg-danger text-white p-1 rounded">{{ $bh->admin }}</span></td>
                                    @else
                                    <td><span class="bg-success text-white p-1 rounded">{{ $bh->admin }}</span></td>
                                    @endif
                                    <td>{{ $bh->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>    
@endsection