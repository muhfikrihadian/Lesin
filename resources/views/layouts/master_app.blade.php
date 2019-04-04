<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lesin | @yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/guru.css') }}">
  <link href='https://unpkg.com/boxicons@1.8.0/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <nav class="navbar navbar-expand-lg text-white">
    @if (Auth::user()->role=="Guru")
    <a class="navbar-brand text-uppercase text-white" href="{{ route('guru.index') }}">Lesin</a>
    @elseif (Auth::user()->role=="Murid")
    <a class="navbar-brand text-uppercase text-white" href="{{ route('murid.index') }}">Lesin</a>
    @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class='bx bx-menu'></i></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
      <ul class="navbar-nav mt-2 mt-lg-0">
        @if (Auth::user()->role=="Murid")
        <li class="nav-item active"><a class="nav-link" href="{{ route('murid.taskMurid') }}">Tugasku</a></li>
        @endif
        @if (Auth::user()->role=="Guru")
        <li class="nav-item active"><a class="nav-link" href="{{ route('guru.taskGuru') }}">Tugasku</a></li>
        @endif
        @auth

        @if (Auth::user()->role=="Guru")
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mulai Mengajar
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="transform: translateX(-50%)">
            <a class="nav-link text-info" href="{{ route('guru.searchOffline') }}">Cari Murid</a>
            <a class="nav-link text-info" href="">Ngajar Online</a>
            <a class="nav-link text-info" href="{{ route('guru.createMateri') }}">Buat Materi</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->username }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="transform: translateX(-50%)">
            <a href="{{ route('guru.profileGuru') }}" class="nav-link">Profile</a>
            <a href="" class="nav-link">Withdraw</a>
            <a href="" class="nav-link">Setting</a>
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              {{ csrf_field() }}
            </form>
          </div>
        </li>
        @endif

        @if (Auth::user()->role=="Murid")
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mulai Les
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="transform: translateX(-50%)">
            <a class="nav-link" href="{{ route('murid.createOffline') }}">Panggil Guru</a>
            <a class="nav-link" href="#">Les Online</a>
            <a class="nav-link" href="{{ route('murid.searchMateri') }}">Cari Materi</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->username }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="transform: translateX(-50%)">
            <a href="{{ route('murid.profileMurid') }}" class="nav-link">Profile</a>
            <a href="" class="nav-link">Isi Lesco</a>
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
  @yield('header')
  <main>
    @yield('content')
  </main>
  <footer class="bg-dark text-white">
    <div id="footer_content" class="py-4">
      <div class="container">
        <div class="row mx-0">
          <div class="col-12 col-md-7 px-0">
            <div class="row mx-0">
              <div class="col-12 col-md-6 px-0">
                <h3 style="font-weight: bolder;" class="mb-3">Tentang Lesin</h3>
                <ul>
                  <li>Tentang Kami</li>
                  <li>Bantuan</li>
                  <li>Kontak Kami</li>
                </ul>
              </div>
              <div class="col-12 col-md-6 px-0">
                <h3 style="font-weight: bolder;" class="mb-3">Produk</h3>
                <ul>
                  <li>Les Offline</li>
                  <li>Materi Offline</li>
                  <li>Les Online</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-5 px-0">
            <h3 style="font-weight: bolder;" class="mb-3">Ikuti Kami</h3>
            <ul>
              <li>Facebook</li>
              <li>Twitter</li>
              <li>Linkedin</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="footer_legal" class="py-3">
      <div class="container">
        <div class="row mx-0">
          <small style="font-size: 17px;">Copyright &copy; Lesin {{ date('Y') }} | All Rights Reserved</small>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ asset('js/jquery.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/popper.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}" charset="utf-8"></script>
  <script>
    $(document).ready(function(){
      $("#show_filter").click(function() {
        $(this).addClass("d-none");
        $("#filter_guru_mobile").addClass("show");
        $("#filter_guru_mobile form").removeClass("p-0").addClass("show px-3");
      });
      $("#close_filter_guru").click(function() {
        $("#show_filter").removeClass("d-none");
        $('#filter_guru_mobile').removeClass("show");
        $("#filter_guru_mobile form").addClass("p-0").removeClass("show px-3");
      });
      $(".custom-file-input").change(function(){
        var file_video= $(this).val();
        $(this).next().text(
          this.files && this.files.length ?
          this.files[0].name : this.value.replace(/^C:\\fakepath\\/i, ''));
      });
    });
  </script>
</body>
</html>
