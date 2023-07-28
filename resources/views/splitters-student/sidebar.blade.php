<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <h3 class="text-center">Perpustakaan</h3>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ (request()->is('student/dashboard*')) ? 'active' : '' }}" href="{{ route('dashboard.siswa') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">UI COMPONENTS</span>
          </li>
          {{-- <li class="sidebar-item">
            <a class="sidebar-link {{ (request()->is('admin/profile*')) ? 'active' : '' }}" href="{{ route('profile.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-article"></i>
              </span>
              <span class="hide-menu">Profile</span>
            </a>
          </li> --}}
                {{-- <i class="fa-solid fa-clipboard-user fs-5"></i> --}}


          {{-- <li class="sidebar-item">
            <a class="sidebar-link {{ (request()->is('admin/category-book*')) ? 'active' : '' }}" href="{{ route('category-book.index') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-bookmark fs-5"></i>
              </span>
              <span class="hide-menu">Kategori Buku</span>
            </a>
          </li> --}}
          <li class="sidebar-item">
            <a class="sidebar-link {{ (request()->is('student/book-student*')) ? 'active' : '' }}" href="{{ route('book-student.index') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-book fs-5"></i>
              </span>
              <span class="hide-menu">Buku</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ (request()->is('student/borrow-history*')) ? 'active' : '' }}" href="{{ route('borrow-history.index') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-book fs-5"></i>
              </span>
              <span class="hide-menu">Riwayat Peminjaman</span>
            </a>
          </li>
          {{-- <li class="sidebar-item">
            <a class="sidebar-link {{ (request()->is('admin/student*')) ? 'active' : '' }}" href="{{ route('student.index') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-user fs-5"></i>
              </span>
              <span class="hide-menu">Siswa</span>
            </a>
          </li> --}}
          {{-- <li class="sidebar-item">
            <a class="sidebar-link {{ (request()->is('admin/borrow*')) ? 'active' : '' }}" href="{{ route('borrow.index') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-hand-point-right fs-5"></i>
              </span>
              <span class="hide-menu">Peminjaman</span>
            </a>
          </li> --}}
          {{-- <li class="sidebar-item">
            <a class="sidebar-link {{ (request()->is('admin/return*')) ? 'active' : '' }}" href="{{ route('return.index') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-hand-point-left fs-5"></i>
              </span>
              <span class="hide-menu">Pengembalian</span>
            </a>
          </li> --}}
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">AUTH</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ (request()->is('student/user-student*')) ? 'active' : '' }}" href="{{ route('user-student.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-login"></i>
              </span>
              <span class="hide-menu">Akun</span>
            </a>
          </li>
          {{-- <li class="sidebar-item">
            <a class="sidebar-link {{ (request()->is('admin/borrow*')) ? 'active' : '' }}" href="{{ route('borrow.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-user-plus"></i>
              </span>
              <span class="hide-menu">Peminjaman</span>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>