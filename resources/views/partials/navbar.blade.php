<nav class="navbar navbar-expand-lg">
  @auth
  @if (Auth::user()->role == 'Murid')
  <a class="navbar-brand text-uppercase mr-0" href="{{ route('murid.index') }}">Lesin</a>
  @else
  <a class="navbar-brand text-uppercase mr-0" href="{{ route('guru.index') }}">Lesin</a>
  @endif
  @endauth
  @guest
  <a class="navbar-brand text-uppercase" href="{{ url('/') }}">Lesin</a>
  @endguest
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class='bx bx-menu'></i></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
    <ul class="navbar-nav mt-2 mt-lg-0">
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      @endguest
      @auth
        @if (Auth::user()->role == 'Murid')
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('murid.taskMurid') }}">Ranselku</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Mulai Les
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="nav-link" href="{{ route('murid.createOffline') }}">Temukan Guru</a>
              <a class="nav-link" href="{{ route('murid.searchMateri') }}">Jelajah Materi</a>
              <a class="nav-link" href="{{ route('murid.createOnline') }}">Les Online</a>
              <a class="nav-link" href="#">Video Konferensi</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->username }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a href="{{ route('murid.profileMurid') }}" class="nav-link">Profile</a>
                <a href="" class="nav-link">Setting</a>
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
              </div>
          </li>
          @elseif (Auth::user()->role == 'Guru')
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('guru.taskGuru') }}">Tugasku</a>
          </li>
          @if (\Request::is('guru/dashboard'))
            @if (count($profil) == 0)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Mulai Mengajar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="nav-link text-info" href="{{ route('guru.searchOffline') }}">Cari Murid</a>
                    <a class="nav-link text-info" href="{{ route('guru.createMateri') }}">Buat Materi</a>
                    <a class="nav-link text-info" href="{{ route('guru.searchOnline') }}">Ngajar Online</a>
                    <a class="nav-link text-info" href="#">Video Konferensi</a>
                </div>
            </li>
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Mulai Mengajar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="nav-link text-info" href="{{ route('guru.searchOffline') }}">Cari Murid</a>
                    <a class="nav-link text-info" href="{{ route('guru.createMateri') }}">Buat Materi</a>
                    <a class="nav-link text-info" href="{{ route('guru.searchOnline') }}">Ngajar Online</a>
                    <a class="nav-link text-info" href="#">Video Konferensi</a>
                </div>
            </li>
            @endif
          @else
          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Mulai Mengajar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="nav-link text-info" href="{{ route('guru.searchOffline') }}">Cari Murid</a>
                    <a class="nav-link text-info" href="{{ route('guru.createMateri') }}">Buat Materi</a>
                    <a class="nav-link text-info" href="{{ route('guru.searchOnline') }}">Ngajar Online</a>
                    <a class="nav-link text-info" href="#">Video Konferensi</a>
                </div>
          </li>
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->username }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a href="{{ route('guru.profileGuru') }}" class="nav-link">Profile</a>
              <a href="" class="nav-link">Setting</a>
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  {{ csrf_field() }}
              </form>
            </div>
          </li>
        @endif
      @endauth
    </ul>
  </div>
</nav>
