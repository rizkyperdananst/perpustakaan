@extends('layouts.dashboard')
@section('title', 'Admin | Profil')
    
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
                        <h5>Data Profil</h5>
                    </div>
                    <div class="card-body">
                        <div class="table responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Pendiri</th>
                                        <th>Berdiri</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $profile->nama }}</td>
                                        <td>{{ $profile->pendiri }}</td>
                                        <td>{{ $profile->tahun }}</td>
                                        <td>
                                            <a href="{{ route('profile.show', $profile->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                            <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-warning">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            {{-- <form action="" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection