@extends('layouts.master_siswa')
@section('title', 'Order Guru')
@section('content')
<div class="container py-4" id="cari_guru">
    <form action="{{ route('murid.createOfflinePost') }}" class="card shadow bg-white p-4" method="POST">
      <h1 class="h3 font-weight-bold mb-4">Panggil Guru Sesuai Keinginanmu</h1>
    {{ csrf_field() }}
    @foreach ($profil as $murid)
      <input type="hidden" name="nmr_murid" value="{{ $murid->phone }}">
      <input type="hidden" name="photo_murid" value="{{ $murid->photo }}">
    @endforeach
      <div class="form-row">
        <div class="form-group col-12 col-md-6">
          <select name="pelajaran" id="matpel" class="custom-select" autofocus required>
            <option value="" selected disabled>Mata Pelajaran</option>
            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
            <option value="Matematika">Matematika</option>
            <option value="Bahasa Inggris">Bahasa Inggris</option>
            <option value="IPA">IPA</option>
            <option value="IPS">IPS</option>
            <option value="Others">Others</option>
          </select>
        </div>
        <div class="form-group col-12 col-md-6">
          <select class="custom-select" name="durasi" required>
            <option value="" selected disabled>Durasi</option>
            <option value="1">1 Jam</option>
            <option value="2">2 Jam</option>
            <option value="3">3 Jam</option>
            <option value="4">4 Jam</option>
            <option value="5">5 Jam</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-12 col-md-6">
          @foreach ($profil as $profile)
            <input type="number" min="1" max="{{ $profile->lesco }}" class="form-control" id="lesco" name="lesco" placeholder="Tarif Lesco" required>
          @endforeach
        </div>
        <div class="form-group col-12 col-md-6">
          <select name="jenjang" id="jenjang" class="custom-select" required>
            <option value="" selected disabled>Jenjang</option>
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMK">SMK</option>
          </select>
        </div>
      </div>
      <div class="form-group col-12 px-0">
        <input type="text" name="kategori_pelajaran" class="form-control text-capitalize" placeholder="Materi Apa Yang Kamu Inginkan (contoh: Aljabar)" required>
      </div>
      <div class="form-group col-12 px-0">
        <textarea name="deskripsi" rows="6" class="form-control" placeholder="Deskripsi" required></textarea>
      </div>
      <div class="form-group col-12 px-0">
        <textarea name="alamat" rows="6" minlength="5" class="form-control" placeholder="Alamat Ketemuan" required></textarea>
      </div>
      <div class="form-row justify-content-between">
        <button type="reset" name="button" class="btn btn-warning text-white shadow-sm">Hapus Semua</button>
        <button type="submit" name="button" class="btn btn-success">Buat Order</button>
      </div>
    </form>
  </div>
</div>
@endsection
@section('footer_all')
  @include('partials.footer')
@endsection
