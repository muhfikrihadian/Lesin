<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesin | Solusi Mencari Guru</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href='https://unpkg.com/boxicons@1.8.0/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
    @include('partials.navbar')
    <header style="background-image: url('{{ asset('img/cover.png') }}')">
      <div class="container">
        <div class="header-caption">
          <h1 class="text-left">Butuh bantuan guru untuk belajar? <br> <strong>#LesinAja</strong></h1>
          <p class="text-left">Pelajaran jadi lebih mudah dengan bantuan guru Lesin</p>
          @auth
            @if (Auth::user()->role == 'Murid')
              <div class="header-caption-action">
                <a href="{{ route('murid.index') }}" class="btn col-4 text-capitalize text-white">Dashboard</a>
              </div>
            @else
              <div class="header-caption-action">
                <a href="{{ route('guru.index') }}" class="btn col-4 text-capitalize text-white">Dashboard</a>
              </div>
            @endif
          @endauth
          @guest
            <div class="header-caption-action">
              <a href="{{ route('register') }}" class="btn btn-info col-4 text-capitalize text-white">daftar sekarang</a>
            </div>
          @endguest
        </div>
      </div>
      <a href="#perkenalan" class="btn rounded-circle" id="go_to_content"><i class='bx bxs-down-arrow'></i></a>
    </header>
    <main>
      <section id="perkenalan">
        <div class="container">
          <h2 class="text-center">Apa Itu <strong class="text-uppercase">Lesin</strong></h2>
          <p class="text-center">
            Platform pencarian guru les privat untuk membantu murid yang kesulitan <br>
            dalam belajar dengan berbagai macam keunggulan.
          </p>
        </div>
      </section>
      <section id="keunggulan">
        <div class="container">
          <h2 class="text-center">Mengapa Harus <strong class="text-uppercase">Lesin</strong>?</h2>
          <div class="row">
            <div class="col-12 col-md-4">
              <figure class="text-center d-flex flex-column height-full align-items-center justify-content-between">
                <img src="{{ asset('img/woman.png') }}" height="100" alt="">
                <figcaption>
                  <h3>Pilihan Mata Pelajaran Lengkap</h3>
                  Semua mata pelajaran dari berbagai jenjang dan kejuruan lengkap ada di Lesin.
                </figcaption>
              </figure>
            </div>
            <div class="col-12 col-md-4">
                <figure class="text-center d-flex flex-column height-full align-items-center justify-content-between">
                  <img src="{{ asset('img/coffee.png') }}" height="100" alt="">
                  <figcaption>
                    <h3>Belajar Dimana saja, Kapan saja</h3>
                    Kamu bebas menentukan belajar dimana dan kapan saja dengan <b>tarif yang kamu inginkan</b>.
                  </figcaption>
                </figure>
            </div>
            <div class="col-12 col-md-4">
                <figure class="text-center d-flex flex-column height-full align-items-center justify-content-between">
                  <img src="{{ asset('img/video-conference.png') }}" height="100" alt="">
                  <figcaption>
                    <h3>Belajar Dimana saja, Kapan saja</h3>
                    Kamu bebas menentukan belajar dimana dan kapan saja dgn <b>tarif yang kamu inginkan</b>.
                  </figcaption>
                </figure>
            </div>
          </div>
        </div>
      </section>
      <section id="tutorin" style="background-image: url('{{ asset('img/cover_too.png') }}');">
        <div class="container height-full">
          <div class="row height-full justify-content-end align-items-center">
            <div class="col-5">
              <h1>#TutorinAjaYuk</h1>
              <p>
                Wah tidak terasa sebentar lagi Ujian Akhir Semester! Murid - murid semakin gencar mencari guru les. Tertarik untuk membantu mereka untuk mencapai nilai maksimal mereka? Tutorin aja yuk di Lesin dan dapatkan Lesco gratis di awal pendaftaranmu!
              </p>
                <a href="{{ route('register') }}" class="btn col-4 text-capitalize text-white" style="height: 55px;align-items: center;padding: 0 1rem !important;border-radius: 5px;transition: all 250ms;text-decoration: none !important;box-shadow: 0px 2px 2px rgba(0,0,0,.26);background-color: #1BA4B1;">Daftar sekarang</a>
            </div>
          </div>
        </div>
      </section>
      <section id="pendapat" class="py-5">
        <div class="container">
          <h2 class="text-center">Pendapat <strong>Lesin</strong> Menurut Para Orang Tua</h2>
          <div class="card">
            <div class="card-body p-0">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner p-4">
                  <div class="carousel-item px-5 text-center active">
                    <img src="{{ asset('img/people.png') }}" height="75" alt="" class="mb-3">
                    <blockquote class="blockquote">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore possimus,
                      dicta iusto vel ipsa commodi!
                      <footer class="blockquote-footer">People Name 1</footer>
                    </blockquote>
                  </div>
                  <div class="carousel-item px-5 text-center">
                    <img src="{{ asset('img/people.png') }}" height="75" alt="" class="mb-3">
                    <blockquote class="blockquote">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore possimus,
                      dicta iusto vel ipsa commodi!
                      <footer class="blockquote-footer">People Name 2</footer>
                    </blockquote>
                  </div>
                  <div class="carousel-item px-5 text-center">
                    <img src="{{ asset('img/people.png') }}" height="75" alt="" class="mb-3">
                    <blockquote class="blockquote">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore possimus,
                      dicta iusto vel ipsa commodi!
                      <footer class="blockquote-footer">People Name 3</footer>
                    </blockquote>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon text-dark" aria-hidden="true">
                    <i class='bx bxs-left-arrow'></i>
                  </span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next text-dark" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"><i class='bx bxs-right-arrow'></i></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="text-white">
      @include('partials.footer')
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
      });
    </script>
  </body>
</html>
