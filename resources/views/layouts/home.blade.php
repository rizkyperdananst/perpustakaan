<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .row {
        width: 100%
    }
    html {
     scroll-behavior: smooth;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Beranda <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('book') }}">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#footer">Tentang</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('login-student') }}" class="nav-link btn btn-primary text-white" href="#">Login</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Selamat datang di Perpustakaan</h1>
      <p class="lead">Temukan berbagai macam buku, artikel, dan referensi di perpustakaan kami.</p>
      <a class="btn btn-primary btn-lg" href="{{ route('book') }}" role="button">Lihat Daftar Buku</a>
    </div>
  </div>

  @yield('content')

  <footer class="bg-dark text-white mt-5" id="footer">
    <div class="container py-3">
      <div class="row">
        <div class="col-lg-6">
          <h5>About</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel turpis non lectus porta tincidunt nec non
            odio. Ut euismod dui eget nibh pretium, nec cursus est feugiat.</p>
        </div>
        <div class="col-lg-6">
          <h5>Contact</h5>
          <p>Email: info@perpustakaan.com</p>
          <p>Phone: 123-456-7890</p>
        </div>
      </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <p>&copy; 2023 Perpustakaan. All rights reserved.</p>
        </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
