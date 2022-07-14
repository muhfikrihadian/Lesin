@extends('layouts.master_siswa')
@section('title', 'Order Guru')
@section('content')
<div class="container py-4" id="pesan_guru">
  <h1 class="h3 mb-4 font-weight-bold">Panggil Guru Sesuai Keinginanmu</h1>
    <form action="{{ route('murid.createOnlinePost') }}" class="card shadow bg-white p-4" method="POST">
    {{ csrf_field() }}
      <div class="form-row">
        <div class="form-group col-12 col-md-6">
          <select name="pelajaran" id="matpel" class="custom-select" required>
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
            <option value="Others">Others</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-12 col-md-6">
          <input type="number" min="1" class="form-control" id="lesco" name="lesco" placeholder="Tarif Lesco" required>
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
        <textarea name="deskripsi" rows="6" class="form-control" placeholder="Deskripsi" required></textarea>
      </div>
      <div class="form-row justify-content-between">
        <button type="submit" name="button" class="btn btn-success">Buat Order</button>
        <button type="reset" name="button" class="btn btn-warning">Hapus Semua</button>
      </div>
    </form>
</div>
@endsection
