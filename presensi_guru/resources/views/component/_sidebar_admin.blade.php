
      <div class="logo">
        <a href="{{route('admin.dashboard.index')}}" class="simple-text logo-normal">
          E-ABSENSI
        </a>
      </div>
      <div class="sidebar-wrapper" style="overflow:scroll">
        <ul class="nav">
            <li class="nav-item active  ">
            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.jabatan.index') }}">
                <i class="fas fa-building"></i>
                <p>Jabatan</p>
            </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.setting.index') }}">
                <i class="fas fa-cogs"></i>
                <p>Setting Absen</p>
            </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.user.index') }}">
                <i class="fas fa-users"></i>
                <p>User</p>
            </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.absensi.index') }}">
                <i class="fas fa-clock-o"></i>
                <p>Absensi</p>
            </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.laporan.index') }}">
                <i class="fas fa-book"></i>
                <p>Laporan</p>
            </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="{{ url('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
      </div>