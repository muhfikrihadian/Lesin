@extends('layouts.master_guru')
@section('title', 'Buat Materi')
@section('content')
<div class="container py-4" id="form_buat_materi">
  <form method="POST" action="{{ route('guru.createMateriPost') }}" class="card shadow bg-white p-4" enctype="multipart/form-data">
    <h1 class="h3 mb-4 font-weight-bold text-dark">Buat Materi Untuk Dapat Dijelajahi Murid</h1>
    {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-12 col-md-6">
        <label for="judul" class="text-dark">Judul Materi</label>
        <input id="judul" type="text" class="form-control" name="judul" placeholder="Berikan Judul Materimu Agar Mudah Dicari" required>
      </div>
      <div class="form-group col-12 col-md-6">
        <label for="lesco" class="text-dark">Tarif Lesco</label>
        <input id="lesco" type="number" class="form-control" placeholder="Berapa Harga Materimu" name="lesco" required>
      </div>
      <div class="form-group col-12 col-md-6">
        <label for="videos" class="text-dark">Link Video Di Youtube</label>
        <input id="videos" type="text" class="form-control" name="videos" placeholder="Berikan Link Video Pengajaranmu Yang Tersimpan Di Youtube" required>
      </div>
      <div class="form-group col-12 col-md-6">
        <label for="picturePost">Thumbnail :</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="sampul" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
      </div>
    </div>
    <div class="form-group col-12 px-0">
      <label for="deskripsi" class="text-dark">Deskripsi Materi</label>
      <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Detail Materimu Apa Sih" rows="7" required></textarea>
    </div>
    <div class="d-flex justify-content-between">
      <a href="{{ url()->previous() }}" class="no-underline text-danger"><i class='bx bx-arrow-back pr-3'></i>Back To Previous Page</a>
      <button type="submit" class="btn btn-success py-2">Buat Materi</button>
    </div>
    </form>
  </div>
  @endsection
  @section('footer_all')
    @include('partials.footer')
  @endsection
