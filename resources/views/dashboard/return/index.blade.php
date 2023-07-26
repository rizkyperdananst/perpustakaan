@extends('layouts.dashboard')
@section('title', 'Admin | Data Pengembalian')
    
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
                <div class="card-header d-flex justify-content-between">
                    <h5>Data Pengembalian</h5>
                    {{-- <a href="{{ route('borrow.create') }}" class="btn btn-info">Tambah</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student</th>
                                    <th>Book</th>
                                    <th>Peminjaman</th>
                                    <th>Pengembalian</th>
                                    <th>Staff</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no= 1;
                                @endphp
                                @foreach ($borrows as $b)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $b->students->nama }}</td>
                                    <td>{{ $b->books->judul }}</td>
                                    <td>{{ $b->peminjaman }}</td>
                                    <td>{{ $b->pengembalian }}</td>
                                    <td>{{ $b->admin }}</td>
                                    <td>{{ $b->status }}</td>
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