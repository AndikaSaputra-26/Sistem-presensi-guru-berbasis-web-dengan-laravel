
      <div class="logo">
        <a href="{{route('guru.dashboard.index')}}" class="simple-text logo-normal">
          E-ABSENSI <br>
          {{ auth()->user()->nama }}
        </a>
      </div>
      <div class="sidebar-wrapper" style="overflow:scroll">
        <ul class="nav">
            <li class="nav-item active  ">
            <a class="nav-link" href="{{ route('guru.dashboard.index') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="{{ route('guru.absen.index') }}">
                <i class="fas fa-graduation-cap"></i>
                <p>Absensi</p>
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