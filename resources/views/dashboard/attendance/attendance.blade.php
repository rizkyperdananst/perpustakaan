@extends('layouts.dashboard')
@section('title', 'Admin | Data Absensi')
    
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Data Absensi</h4>
                        <a href="{{ route('attendance.create') }}" class="btn btn-info ms-3">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Kelas</th>
                                        <th>Jam</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no= 1;
                                    @endphp
                                    @foreach ($attendances as $a)
                                    <tr>
                                        <td width="5%">{{ $no++ }}</td>
                                        <td>{{ $a->nama }}</td>
                                        <td>{{ $a->npm }}</td>
                                        <td>{{ $a->kelas }}</td>
                                        <td>{{ $a->jam }}</td>
                                        <td>{{ $a->tanggal }}</td>
                                        <td width="5%">{{ $a->keterangan }}</td>
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