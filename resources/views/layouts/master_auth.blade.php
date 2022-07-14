<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lesin | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href='https://unpkg.com/boxicons@1.8.0/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
    <nav>
      <a href="{{ url('/') }}">Lesin</a>
    </nav>
    @yield('content')
    <script src="{{ asset('js/jquery.js') }}" charset="utf-8"></script>
    <script>
      $(document).ready(function(){
        $("form .input_box:nth-last-of-type(2) .visiblePassword").click(function(){
          $(this).toggleClass("show_password");
          if ($(this).siblings("input[name='password']").attr("type") == "password") {
            $(this).siblings("input[name='password']").attr("type", "text");
          }
          else {
            $(this).siblings("input[name='password']").attr("type", "password");
          }
        });
        $("form .input_box:last-of-type .visiblePassword").click(function(){
          if ($(this).siblings("input[name='password_confirmation']").attr("type") == "password") {
            $(this).siblings("input[name='password_confirmation']").attr("type", "text");
          }
          else {
            $(this).siblings("input[name='password_confirmation']").attr("type", "password")
          }
        });
        $("input[name='username']").keypress(function(e){
          if(e.which === 32)
            return false;
        });
      });
    </script>
  </body>
</html>
