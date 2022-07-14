@extends('layouts.master_auth')
@section('title', 'Login Page')
@section('content')
<main id="register_page">
  <h1>Daftar Dirimu Ke <strong>Lesin</strong></h1>
  <form action="{{ route('register') }}" method="post">
    {{ csrf_field() }}
    <div class="box_row">
      <div class="input_box">
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" placeholder="Siapa Nama Lengkapmu" required>
        @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
      </div>
      <div class="input_box">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Buat Username Unikmu" required>
      </div>
    </div>
    <div class="box_row">
      <div class="input_box">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Daftarkan Emailmu" required>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
    </div>
    <div class="input_box">
      <label for="role">Daftar Sebagai</label>
      <select class="" id="role" name="role">
        <option value="Guru">Guru</option>
        <option value="Murid">Murid</option>
      </select>
    </div>
    <div class="input_box">
      <label for="password">Kata Sandi</label>
      <input type="password" id="password" name="password" placeholder="Masukan Passwordmu" required>
      <i class='bx bx-show visiblePassword'></i>
      @if ($errors->has('password'))
        <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>
    <div class="input_box">
      <label for="password_confirmation">Konfirmasi Kata Sandi</label>
      <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukan Passwordmu" required>
      <i class='bx bx-show visiblePassword'></i>
    </div>
    <button type="submit" name="button">Register</button>
  </form>
  <small>Sudah Punya Akun? <a href="{{ route('login') }}" id="login">Login</a></small>
</main>
@endsection
