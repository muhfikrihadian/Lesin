@extends('layouts.master_siswa')
@section('title', 'Order Guru')
@section('content')
<div class="container py-4" id="cari_guru">
  <form action="{{ route('murid.isiProfileMuridAction') }}" class="card p-4 shadow bg-white" method="POST" enctype="multipart/form-data">
    <h1 class="h3 mb-4">Isi Biodatamu !</h1>
    {{ csrf_field() }}
    <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="idmurid" id="imurid">
    <div class="form-row">
      <div class="form-group col">
        <label for="nisn">NISN</label>
        <input type="number" min="1" class="form-control" placeholder="Isi Dengan Nomor NISN Asli Kamu" name="nisn" id="nisn" required>
      </div>
      <div class="form-group col">
        <label for="norek">Nomor Rekening</label>
        <input type="number" class="form-control" name="norek" placeholder="Isi Dengan Nomor Asli Rekening Kamu" id="norek" required>
      </div>
    </div>
      <div class="form-group">
        <label for="sekolah">Asal Sekolah</label>
        <input type="text" class="form-control text-capitalize" placeholder="berasal dari sekolaha mana kamu" name="sekolah" id="sekolah" required>
      </div>
      <div class="form-group">
        <label for="jenjang">Jenjang Pendidikan</label>
        <select class="form-control" id="jenjang" name="jenjang" required="">
          <option value="TK">TK</option>
          <option value="SD">SD / Sederajat</option>
          <option value="SD">SMP / Sederajat</option>
          <option value="SMA">SMA / Sederajat</option>
          <option value="Umum">Umum</option>
        </select>
      </div>
      <div class="form-group">
        <label for="phone">Nomor Handphone</label>
        <input type="number" class="form-control" name="phone" placeholder="Isi Dengan Nomor Asli Teleponmu" id="phone" required>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat Rumah</label>
        <textarea name="alamat" id="alamat" rows="2" minlength="10" placeholder="Tempat Tinggal Kamu Dimana" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <label for="tentang">Tentang Anda</label>
        <textarea name="tentang" id="tentang" rows="2" minlength="10" placeholder="Deskripsikan Dirimu" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="photo" id="photo" required>
          <label for="photo" class="custom-file-label">Photo Profile</label>
        </div>
      </div>
      <button type="submit" name="button" class="btn btn-success">Submit</button>
  </form>
</div>
@endsection
@section('footer_all')
  @include('partials.footer')
@endsection
