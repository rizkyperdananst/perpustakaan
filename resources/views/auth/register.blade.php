<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Perpustakaan</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{ url('assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <h2 class="text-center mb-2">Perpustakaan</h2>
                <p class="text-center">Register</p>
                <form action="{{ route('registerProcess') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukkan nama" required>
                    @error('nama')
                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="masukkan nis" required>
                    @error('nis')
                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" placeholder="masukkan kelas" required>
                    @error('kelas')
                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="masukkan password" required>
                    @error('password')
                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                    @enderror
                  </div>
                  {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="#">Forgot Password ?</a>
                  </div> --}}
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
                    <a class="text-primary fw-bold ms-2" href="{{ route('login-student') }}">Silahkan login!</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ url('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>