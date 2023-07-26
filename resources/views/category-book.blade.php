@extends('layouts.home')
@section('title', 'Home | Kategori Buku')
    
@section('content')
<div class="container">
    <h2 class="text-center mb-3">Kategori Buku : {{ $cb->nama_kategori }}</h2>
    <div class="row mb-3">
        @forelse ($books as $b)
        <div class="col-md-3">
          <div class="card mb-4">
            <img src="{{ url('storage/cover-books/'. $b->image) }}" class="card-img-top" alt="Image 1">
            <div class="card-body">
              <h5 class="card-title">{{ $b->judul }}</h5>
              <p class="card-text">{{ Str::limit($b->keterangan, 30, '...') }}</p>
              <p class="fw-bold">Stok : {{ $b->stok }}</p>
              <a href="{{ route('detail-book', $b->slug) }}" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
        @empty
            <h3>Data buku kosong</h3>
        @endforelse
        <div class="col-md-3">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">Kategori Buku</h5>
                @forelse($category_books as $cb)
                <a href="{{ route('category-book', $cb->id) }}" class="card-text">{{ $cb->nama_kategori }}</a>
                @empty
                <p class="card-text">Data Kategori Buku Tidak Ada..</p>
                @endforelse
              </div>
            </div>
          </div>
      </div>
</div>
@endsection