@extends('layouts.master_siswa')
@section('title', 'Cari Guru Sesuai Keinginanmu')
@section('header')
  @if (count($profil) == 0)
    <div class="alert alert-danger text-center" role="alert">
    Kamu tidak bisa melakukan pemesanan guru dan topup <b>Coin Lesco</b> Sebelum melengkapi profil. <a href="{{ route('murid.profileMurid') }}">Lengkapi sekarang</a>
  </div>
  @endif
<header>
  <div class="container">
    <h1 id="header_slogan">Selamat Datang, <strong>{{ Auth::user()->name }}</strong></h1>
    <div class="row mb-5">
      @if (count($profil) == 0)
          <div class="col-2">
              <a href="{{ route('murid.createOffline') }}" class="btn disabled" aria-disabled="true">
                <i class='h1 mb-1 bx bx-search-alt'></i>
                Pesan Guru
              </a>
          </div>
          <div class="col-2">
            <a href="{{ route('murid.searchMateri') }}" class="btn disabled" aria-disabled="true">
              <i class='h1 mb-1 bx bxl-youtube'></i>
              Jelajah Materi
            </a>
          </div>
          <div class="col-2">
            <a href="{{ route('murid.profileMurid') }}" class="btn disabled" aria-disabled="true">
              <i class='h1 mb-1 bx bx-user'></i>
              Profile
            </a>
          </div>
      @else
        @foreach ($profil as $profile)
          <div class="col-2">
            @if ($profile->lesco < 1)
              <a href="{{ route('murid.createOffline') }}" class="btn disabled" aria-disabled="true">
                <i class='h1 mb-1 bx bx-search-alt'></i>
                Pesan Guru
              </a>
            @else
              <a href="{{ route('murid.createOffline') }}" class="btn">
                <i class='h1 mb-1 bx bx-search-alt'></i>
                Pesan Guru
              </a>
            @endif
          </div>
          <div class="col-2">
            <a href="{{ route('murid.searchMateri') }}" class="btn">
              <i class='h1 mb-1 bx bxl-youtube'></i>
              Jelajah Materi
            </a>
          </div>
          <div class="col-2">
            <a href="{{ route('murid.profileMurid') }}" class="btn">
              <i class='h1 mb-1 bx bx-user'></i>
              Profile
            </a>
          </div>
        @endforeach
      @endif
    </div>
    <div class="row">
      @foreach($profil as $profile)
      <div class="col-6">
        <div class="d-flex py-3 px-4 justify-content-between align-items-center">
          <span class="h5 mb-0 text-white">Lesco Cash
            <var class="d-block text-left">
              <sup>Lc</sup> @if ($profile->lesco == 0) 0 @else {{ $profile->lesco }} @endif
            </var>
          </span>
          <a href="javascript:void(0)" class="btn btn-dark shadow-sm show-modal">Top Up Lesco</a>
          <div class="modal-custom-overlay">
            <div class="modal-custom">
              <div class="modal-custom-header">
                <h1 class="h2">Topup Lescomu</h1>
              </div>
              <div class="modal-custom-body">
                @include('murid.topup')
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</header>
@endsection
@section('footer_top')
  @include('partials.footer_top')
@endsection
