@extends('layouts.dashboard')
@section('title', 'Admin | Detail Profile')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Detail Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="table responsive">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $profile->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pendiri</th>
                                        <td>{{ $profile->pendiri }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun</th>
                                        <td>{{ $profile->tahun }}</td>
                                    </tr>
                                    <tr>
                                        <th>Profile</th>
                                        <td><img src="{{ url('storage/profile', $profile->profile) }}" alt="Profie" class="img img-fluid img-thumbnail rounded" width="200"></td>
                                    </tr>
                                    <tr>
                                        <th>Penanggung Jawab</th>
                                        <td>{{ $profile->penanggung_jawab }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('profile.index') }}" class="btn btn-warning float-end me-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection