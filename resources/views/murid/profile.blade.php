@extends('layouts.master_siswa')
@section('title', 'Profile Kamu')
@section('content')

<div class="container py-5" id="profile_page">
  <div class="row m-0 align-items-start">
    <aside class="col-4 bg-white rounded border">
      <figure class="text-center my-3">
        @if(count($profil) > 0)
        @foreach($profil as $profile)
        <a class="btn d-block mb-4 shadow-sm" href="{{ route('murid.updateProfileMurid', ['id' => $profile->id]) }}">Perbarui Profilmu</a>
        @endforeach
        @else
        <a href="{{ route('murid.isiProfileMurid') }}" class="btn d-block mb-4 shadow-sm">Lengkapi Profilmu</a>
        @endif
        @if(count($profil) > 0)
        @foreach($profil as $profile)
        <img src="{{ asset('photoguru/'.$profile->photo) }}" height="90" class="d-block mt- mx-auto">
        <figcaption class="font-weight-bold py-2">
          <span class="d-block">{{ Auth::user()->name }}</span>
          <small class="text-secondary">Jumlah Lesco: {{ $profile->lesco }}</small>
        </figcaption>
        @endforeach
        @else
        <img src="{{ asset('photoguru/people.png') }}" height="90" class="d-block mt- mx-auto">
        <figcaption class="font-weight-bold py-2">
          <span class="d-block">{{ Auth::user()->name }}</span>
          <small class="text-secondary">Jumlah Lesco: 0</small>
        </figcaption>
        @endif
      </figure>
      <div id="people_details" class="border-top">
        <h1 class="h5 my-3 text-dark">Informasi Pribadimu</h1>
        <ul class="m-0">
          <li class="py-2">
            <label class="d-block text-secondary">Email Kamu</label>
            <small class="font-weight-bold">{{ Auth::user()->email }}</small>
          </li>
          <li class="py-2">
            <label class="d-block text-secondary">Nomor Telepon</label>
            @if(isset($profil))
            @foreach($profil as $profile)
            <small class="font-weight-bold">{{ $profile->phone }}</small>
            @endforeach
            @endif
          </li>
          <li class="py-2">
            <label class="d-block text-secondary">Alamat</label>
            @if(isset($profil))
            @foreach($profil as $profile)
            <address class="font-weight-bold m-0">{{ $profile->alamat }}</address>
            @endforeach
            @endif
          </li>
          <li class="py-2">
            <label for="" class="d-block text-secondary">NISN</label>
            @if (count($profil) > 0)
            @foreach ($profil as $profile)
            <var class="font-weight-bold">{{ $profile->nisn }}</var>
            @endforeach
            @else
            <span class="font-weight-bold">. . . .</span>
            @endif
          </li>
          <li class="py-2">
            <label class="d-block text-secondary">Nomor Rekening</label>
            @foreach($profil as $profile)
            <var class="font-weight-bold text-normal" style="font-style: normal;">{{ $profile->norek }}</var>
            @endforeach
          </li>
          <li class="py-2">
            <label class="d-block text-secondary">Tentang Kamu</label>
            @if (count($profil) > 0)
            @foreach ($profil as $profile)
            <p class="font-weight-bold">{{ $profile->tentang }}</p>
            @endforeach
            @else
            <span class="font-weight-bold">. . . . </span>
            @endif
          </li>
        </ul>        </div>
      </aside>
      <section class="col ml-5 bg-white px-0 border">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Riwayat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video Saya</a>
          </li>
        </ul>
        <div class="tab-content p-2" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            @if (count($history) > 0)
            @foreach ($history as $pelajaran)
            <article class="card shadow-sm col px-0 mb-3">
              <div class="d-flex justify-content-between px-3 pt-3 pb-1">
                <p class="font-weight-bold">{{ $pelajaran->pelajaran }}</p>
                <time class="font-italic">{{ $pelajaran->created_at }}</time>
              </div>
              <div class="d-flex justify-content-between px-3 pt-1 pb-3">
                <p class="m-0">{{ $pelajaran->teachername }}</p>
                <span>Tarif : <var>{{ $pelajaran->lesco }} Lesco</var></span>
              </div>
              <div class="action bg-light text-center p-2">
                <a href="">Lihat Detail</a>
              </div>
            </article>
            @endforeach
            @else
            <div class="alert alert-warning text-capitalize col" role="alert">
              Kamu belum pernah memesan guru
            </div>
            @endif
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @if (count($videos) > 0)
            @foreach ($videos as $video)
            <div class="card-body p-2">
              <figure class="d-flex mb-3">
                <img class="col-md-4 px-0 border-right" height="150" src="{{ asset('sampul/'.$video->sampul)}}" style="object-fit: cover;">
                <figcaption class="col-md-8">
                  <h5 class="card-title"><a href="{{ $video->video }}" target="_blank">{{ $video->judul }}</a></h5>
                  <p class="card-text">{{ $video->deskripsi }}</p>
                  <var class="position-absolute text-warning" style="right: 1rem;top: 0;">{{ $video->lesco }} Lesco</var>
                  <a href="{{route('murid.printSertifikat', ['id' => $video->id])}}" class="position-absolute" style="bottom: 10px;">Download Sertifikat</a>
                </figcaption>
              </figure>
              
            </div>
            @endforeach
            @else
            <div class="alert alert-warning text-capitalize col" role="alert">
              Kamu belum pernah memesan video
            </div>
            @endif
          </div>
        </div>
      </section>
    </div>
  </div>

  @endsection

  @section('footer_all')
  @include('partials.footer')
  @endsection
