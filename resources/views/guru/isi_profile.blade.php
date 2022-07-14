@extends('layouts.master_guru')
@section('title', 'Order Guru')
@section('content')
<div class="container py-4" id="isi_profile">
    <form action="{{ route('guru.isiProfileGuruAction') }}" class="card shadow bg-white p-4" method="POST" enctype="multipart/form-data">
      <h1 class="h3 font-weight-bold mb-4">Lengkapi Profilmu Dengan Baik</h1>
      {{ csrf_field() }}
      <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="idguru" id="idguru">
      <div class="form-row">
        <div class="form-group col">
          <label for="nik">NIK</label>
          <input type="number" min="1" class="form-control" placeholder="Isi Dengan Nomor Asli KTP Kamu" name="ktp" id="nik" autofocus required>
        </div>
        <div class="form-group col">
          <label for="norek">Nomor Rekening</label>
          <input type="number" class="form-control"  placeholder="Isi Dengan Nomor Asli Rekening Kamu" name="norek" id="norek" required>
        </div>
      </div>
      <div class="form-group">
        <label for="phone">Nomor Handphone</label>
        <input type="number" class="form-control" name="phone" id="phone" placeholder="Isi Dengan Nomor Asli Teleponmu" required>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat Rumah</label>
        <textarea name="alamat" id="alamat" rows="7" minlength="10" wrap="soft" placeholder="Cantumkan Alamat Tinggal Kamu Sekarang"
        class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <label for="tentang">Tentang Anda</label>
        <textarea name="tentang" id="tentang" rows="7" minlength="10" wrap="soft" placeholder="eg: Bekerja di . . ." class="form-control" required></textarea>
      </div>
      <div class="form-group mb-4">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="photo" id="photo" required>
          <label for="photo" class="custom-file-label">Photo Profile</label>
        </div>
      </div>
      <div class="d-flex-justify-content-between align-items-center">
        <button type="submit" name="button" class="btn btn-success float-right mb-4">Submit</button>
        <a href="{{ url()->previous() }}" class="text-danger"><i class='bx bx-arrow-back'></i>&nbsp;Kembali Ke Halaman Sebelumnya</a>
      </div>
  </form>
</div>
@endsection
@section('footer_all')
  @include('partials.footer')
@endsection
