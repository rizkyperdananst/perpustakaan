@extends('layouts.home')
@section('title', 'Home | Daftar Buku')
    
@section('content')
<div class="container">
     <div class="row mb-3">
          <div class="col-md-12">
               <div class="card shadow">
                    <div class="card-body">
                         <img src="{{ url('storage/cover-books/'. $b->image) }}" class="card-img-top" alt="Gambar Buku">
                         <h5 class="card-title mt-3">{{ $b->judul }}</h5>
                         <p class="card-text">{{ $b->keterangan }}</p>
                    </div>
               </div>
          </div>
     </div>
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
     </div>
     <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-12">
               {{ $books->links() }}
          </div>
     </div>
   </div>
@endsection