@extends('layouts.master_siswa')
@section('title', 'Hasil Pencarian')
@section('content')
<div class="container py-4" id="search_materi">
  <form method="POST" action="{{ route('murid.searchMateriPost') }}" class="my-3">
    {{ csrf_field() }}
    <div class="form-group col-12 position-relative px-0">
      <input id="materi" type="text" class="form-control" name="materi" placeholder="Apa yang ingin kamu pelajari" required>
      <button type="submit" class="btn shadow-none" name="button"><i class='bx bx-search-alt'></i></button>
    </div>
  </form>
  <hr>
  @if(isset($videos))
  @foreach($videos as $video)
  <form action="{{ route('murid.buyVideo') }}" method="POST">
    {{ csrf_field() }}
    <div class="card p-0 col-12 shadow-sm mb-3">
      <div class="card-body p-0">
        <figure class="d-flex m-0">
          <img class="col-md-4 px-0 border-right" height="150" src="{{ asset('sampul/'.$video->sampul)}}" style="object-fit: cover;">
          <figcaption class="col-md-8 py-3">
            <h5 class="card-title">{{ $video->judul }}</h5>
            <p class="card-text">{{ $video->deskripsi }}</p>
            <var class="position-absolute">{{ $video->lesco }}</var>


            <input type="hidden" value="{{ $video->id }}" class="form-control" name="idvideo" id="idvideo">
            <input type="hidden" value="{{ $video->guru }}" class="form-control" name="guru" id="guru">
            <input type="hidden" value="{{ $video->judul }}" class="form-control" name="judul" id="judul">
            <input type="hidden" value="{{ $video->deskripsi }}" class="form-control" name="deskripsi" id="deskripsi">
            <input type="hidden" value="{{ $video->video }}" class="form-control" name="video" id="video">
            <input type="hidden" value="{{ $video->sampul }}" class="form-control" name="sampul" id="sampul">
            <input type="hidden" value="{{ $video->lesco }}" class="form-control" name="lesco" id="lesco">
            <button type="submit" name="button" class="btn btn-success">Beli Video</button>
          </figcaption>
        </figure>
      </div>
    </div>
  </form>
  @endforeach
  @endif
</div>
@endsection
@section('footer_all')
@include('partials.footer')
@endsection
