<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesin | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/guru.css') }}">
    <link href='https://unpkg.com/boxicons@1.8.0/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  </head>
  <body>
    @include('partials.navbar')
    @yield('header')
    <main>
      @yield('content')
    </main>
    <footer class="bg-dark text-white">
      @yield('footer_top')
      @yield('footer_bottom')
      @yield('footer_all')
    </footer>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        $(".custom-file-input").change(function(){
          var valuePhoto= $(this).val().replace(/C:\\fakepath\\/i, '');
          $(this).next().text(valuePhoto);
        });
        $(".modal-custom-overlay").click(function(e) {
          if (e.target !== this)
          return;
          $(this).removeClass("show");
        });
        $("select").select2();
        $(".show-modal").click(function() {
          $(this).next().addClass("show");
        });
      });
    </script>
    @yield('script')
  </body>
</html>
