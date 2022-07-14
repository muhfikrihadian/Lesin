@extends('layouts.master_guru')
@section('title', 'Profile Kamu')
@section('content')

<div class="container py-5" id="profile_page">
    <div class="row m-0 align-items-start">
      <aside class="col-4 bg-white rounded border">
          <figure class="text-center my-3">
            @if(count($profil) > 0)
            @foreach($profil as $profile)
            <a class="btn d-block mb-4 shadow-sm" href="{{ route('guru.updateProfileGuru', ['id' => $profile->id]) }}">Perbarui Profilmu</a>
            @endforeach
            @else
              <a href="{{ route('guru.isiProfileGuru') }}" class="btn d-block mb-4 shadow-sm">Lengkapi Profilmu</a>
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
                <label for="" class="d-block text-secondary">KTP</label>
                @if (count($profil) > 0)
                  @foreach ($profil as $profile)
                  <var class="font-weight-bold">{{ $profile->ktp }}</var>
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
            <a class="nav-link active" id="orderan-tab" data-toggle="tab" href="#orderan" role="tab" aria-controls="orderan" aria-selected="true">Riwayat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Materi</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane p-4 fade show active" id="orderan" role="tabpanel" aria-labelledby="orderan-tab">
            @if (count($history) > 0)
              @foreach ($history as $pelajaran)
                <article class="card shadow-sm col px-0 mb-3">
                  <div class="d-flex justify-content-between px-3 pt-3 pb-1">
                    <p class="font-weight-bold">{{ $pelajaran->pelajaran }}</p>
                    <time class="font-italic">{{ $pelajaran->created_at }}</time>
                  </div>
                  <div class="d-flex justify-content-between px-3 pt-1 pb-3">
                    <p class="m-0">{{ $pelajaran->studentname }}</p>
                    <span>Tarif Lesco: <var>{{ $pelajaran->lesco }}</var></span>
                  </div>
                </article>
              @endforeach
            @else
              <div class="alert alert-warning text-capitalize col" role="alert">
                Kamu belum memiliki orderan apapun
              </div>
            @endif
          </div>
          <div class="tab-pane p-4 fade" id="video" role="tabpanel" aria-labelledby="video-tab">
            @if (count($videos) > 0)
              @foreach ($videos as $video)
                <article class="card shadow-sm col px-0">
                  <div class="d-flex justify-content-between px-3 pt-3 pb-1">
                    <p class="font-weight-bold">{{{ $video->judul }}}</p>
                  </div>
                  <div class="d-flex justify-content-between px-3 pt-1 pb-3">
                    <span>Tarif Lesco: <var>{{ $video->lesco }} Lesco</var></span>
                  </div>
                  <div class="action bg-light text-center p-2">
                    <a href="">Lihat Detail</a>
                  </div>
                </article>
              @endforeach
              {{ $videos->links('vendor.pagination.bootstrap-4') }}
            @else
              <div class="alert alert-warning text-capitalize col" role="alert">
                Kamu belum pernah membagikan video
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
