@extends('layouts.master_auth')
@section('title', 'Login Page')
@section('content')
  <main id="login_page">
    <h1>Masuk Ke <strong>Lesin</strong></h1>
    <form action="{{ route('login') }}" method="post">
      {{ csrf_field() }}
      <div class="input_box">
        <label for="email">Emails</label>
        <input type="text" id="email" name="email" placeholder="Masukan Emailmu Yang Sudah Terdaftar" required>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="input_box">
        <label for="password">Kata Sandi</label>
        <input type="password" id="password" name="password" placeholder="Masukan Passwordmu" required>
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
      <button type="submit" name="button">Masuk</button>
    </form>
    <a href="{{ route('password.request') }}" id="forgot_password">Lupa Kata Sandi</a>
    <span id="register">Belum punya akun? <a href="{{ route('register') }}">daftar sekarang !</a></span>
  </main>
@endsection