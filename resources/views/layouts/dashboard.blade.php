
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{ url('assets/css/styles.min.css') }}" />

  {{-- DataTables --}}
  <link href="{{ url('assets/DataTables/datatables.min.css') }}" rel="stylesheet" />

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('splitters.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('splitters.header')
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        @include('splitters.main')

        @include('splitters.footer')
      </div>
    </div>
  </div>
  <script src="{{ url('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ url('assets/js/app.min.js') }}"></script>
  <script src="{{ url('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ url('assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ url('assets/js/dashboard.js') }}"></script>

  <script src="https://kit.fontawesome.com/e7f5845a19.js" crossorigin="anonymous"></script>

  {{-- DataTables --}}
  <script src="{{ url('assets/DataTables/datatables.min.js') }}"></script>
  <script>
      $(document).ready(function() {
          $('#dataTable').DataTable();
      });
  </script>

</body>

</html>