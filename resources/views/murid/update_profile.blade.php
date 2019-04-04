@extends('layouts.master_siswa')
@section('title', 'Order Guru')
@section('content')
<div class="container py-4" id="update_profile">
  <form action="{{ route('murid.updateProfileMuridAction') }}" class="card p-4 shadow bg-white" method="POST" enctype="multipart/form-data">
    <h1 class="h3 mt-1 font-weight-bold mb-4">Silahkan Update Profilemu</h1>
      @if(count($profil) > 0)
      @foreach($profil as $profile)
        {{ csrf_field() }}
        <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="idmurid" id="idmurid">

        <div class="form-group">
          <label for="sekolah">Asal Sekolah</label>
          <input type="text" value="{{ $profile->sekolah }}" class="form-control" name="sekolah" id="sekolah" required>
        </div>
        <div class="form-group">
          <label for="jenjang">Jenjang Pendidikan</label>
          <select class="form-control" id="jenjang" name="jenjang" required="">
            <option value="{{ $profile->jenjang }}" selected>{{ $profile->jenjang }}</option>
            <option value="TK">TK</option>
            <option value="SD">SD / Sederajat</option>
            <option value="SD">SMP / Sederajat</option>
            <option value="SMA">SMA / Sederajat</option>
            <option value="Umum">Umum</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nisn">NISN</label>
          <input type="number" value="{{ $profile->nisn }}" class="form-control" name="nisn" id="nisn">
        </div>
        <div class="form-group">
          <label for="norek">Nomor Rekening</label>
          <input type="number" value="{{ $profile->norek }}" class="form-control" name="norek" id="norek">
        </div>
        <div class="form-group">
          <label for="phone">Nomor Handphone</label>
          <input type="number" value="{{ $profile->phone }}" class="form-control" name="phone" id="phone" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat Rumah</label>
          <textarea name="alamat" id="alamat" rows="2" minlength="10" class="form-control" required>{{ $profile->alamat }}</textarea>
        </div>
        <div class="form-group">
          <label for="tentang">Tentang Anda</label>
          <textarea name="tentang" id="tentang" rows="2" minlength="10" class="form-control" required>{{ $profile->tentang }}</textarea>
        </div>
        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="photo" id="photo" value="{{ $profile->photo }}">
            <label for="photo" class="custom-file-label">{{ $profile->photo }}</label>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <a href="{{ url()->previous() }}"><i class='bx bx-arrow-back'></i> Kembali Ke Halaman Sebelumnya</a>
          <button type="submit" name="button" class="btn btn-success">Submit</button>
        </div>
      @endforeach
      @else
      <h1>Tidak ada</h1>
      @endif
  </form>
</div>
@endsection
@section('footer_all')
  @include('partials.footer')
@endsection
