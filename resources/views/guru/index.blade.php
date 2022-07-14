@extends('layouts.master_guru')
@section('title', 'Cari Guru Sesuai Keinginanmu')
@section('header')
  @if (count($profil) == 0)
    <div class="alert alert-danger text-center" role="alert">
    Kamu tidak bisa memulai mengajar dan melakukan withdraw <b>Coin Lesco</b> sebelum melengkapi profil. <a href="{{ route('guru.profileGuru') }}">Lengkapi sekarang</a>
  </div>
  @endif
  <header>
    <div class="container">
      <h1 id="header_slogan">Selamat Datang, <strong>{{ Auth::user()->name }}</strong></h1>
      <div class="row mb-5">
        @if (count($profil) == 0)
        <div class="col-2">
          <a href="{{ route('guru.searchOffline') }}" class="btn disabled" aria-disabled="true">
            <i class='h1 mb-1 bx bx-search-alt'></i>
            Temukan Murid
          </a>
        </div>
        <div class="col-2">
          <a href="{{ route('guru.createMateri') }}" class="btn disabled" aria-disabled="true">
            <i class='h1 mb-1 bx bx-plus'></i>
            Buat Materi
          </a>
        </div>
        <div class="col-2">
          <a href="{{ route('guru.profileGuru') }}" class="btn disabled" aria-disabled="true">
            <i class='h1 mb-1 bx bx-user'></i>
            Profile
          </a>
        </div>
        @else
          <div class="col-2">
            <a href="{{ route('guru.searchOffline') }}" class="btn">
                <i class='h1 mb-1 bx bx-search-alt'></i>
                Temukan Murid
            </a>
          </div>
          <div class="col-2">
            <a href="{{ route('guru.createMateri') }}" class="btn">
              <i class='h1 mb-1 bx bx-plus'></i>
              Buat Materi
            </a>
          </div>
          <div class="col-2">
            <a href="{{ route('guru.profileGuru') }}" class="btn">
              <i class='h1 mb-1 bx bx-user'></i>
              Profile
            </a>
          </div>
        @endif
      </div>
      <div class="row">
      @if(count($profil) > 0)
      @foreach($profil as $profile)
        <div class="col-6">
          @if (empty($profile->lesco))
          <div class="d-flex py-3 px-4 justify-content-between align-items-center">
            <span class="h5 mb-0">Lesco Cash<var class="d-block text-left"><sup>Lc</sup>0</var></span>
            <a href="javascript:void(0);" class="btn btn-dark shadow-sm show-modal disabled" aria-disabled="true">Withdraw Lesco</a>
            <div class="modal-custom-overlay">
              <div class="modal-custom">
                <div class="modal-custom-header">
                  <h1 class="h2">Withdraw Lescomu</h1>
                </div>
                <div class="modal-custom-body">
                  @include('guru.withdraw')
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="d-flex py-3 px-4 justify-content-between align-items-center">
            <span class="h5 mb-0">Lesco Cash<var class="d-block text-left"><sup>Lc</sup>{{ $profile->lesco }}</var></span>
            <a href="javascript:void(0);" class="btn btn-dark shadow-sm show-modal disabled" aria-disabled="true">Withdraw Lesco</a>
            <div class="modal-custom-overlay">
              <div class="modal-custom">
                <div class="modal-custom-header">
                  <h1 class="h2">Withdraw Lescomu</h1>
                </div>
                <div class="modal-custom-body">
                  @include('guru.withdraw')
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
        @endforeach
        @else
          <div class="col-6">
            <div class="d-flex py-3 px-4 justify-content-between align-items-center">
              <span class="h5 mb-0">Lesco Cash<var class="d-block text-left"><sup>Lc</sup>0</var></span>
              <a href="javascript:void(0);" class="btn btn-dark shadow-sm show-modal disabled" aria-disabled="true">Withdraw Lesco</a>
              <div class="modal-custom-overlay">
                <div class="modal-custom">
                  <div class="modal-custom-header">
                    <h1 class="h2">Withdraw Lescomu</h1>
                  </div>
                  <div class="modal-custom-body">
                    @include('guru.withdraw')
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </header>
@endsection
@section('footer_all')
  @include('partials.footer')
@endsection
