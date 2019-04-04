@extends('layouts.master_guru')
@section('title', 'Order Guru')
@section('content')
<div class="container py-5" id="update_profile">
  <form action="{{ route('guru.updateProfileGuruAction') }}" class="card shadow bg-white p-4" method="POST" enctype="multipart/form-data">
    <h1 class="h3 font-weight-bold">Perbarui Profilmu</h1>
    {{ csrf_field() }}
    <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="idguru" id="idguru">
    @if(isset($profil))
    @foreach($profil as $profile)
      <div class="form-row">
        <div class="form-group col">
          <label for="nik">NIK</label>
          <input type="number" value="{{ $profile->ktp }}" class="form-control" name="ktp" id="nik">
        </div>
        <div class="form-group col">
          <label for="norek">Nomor Rekening</label>
          <input type="number" value="{{ $profile->norek }}" class="form-control" name="norek" id="norek">
        </div>
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
        <textarea name="tentang" id="tentang" rows="2" minlength="10" class="form-control" placeholder="eg: Bekerja di . . ." required>{{ $profile->tentang }}</textarea>
      </div>
      @endforeach
      @endif
      <div class="form-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="photo" id="photo">
          <label class="custom-file-label" for="photo">Photo Profile</label>
        </div>
      </div>
      <div class="d-flex-justify-content-between align-items-center">
        <a href="{{ url()->previous() }}" class="text-danger"><i class='bx bx-arrow-back'></i>&nbsp;Kembali Ke Halaman Sebelumnya</a>
        <button type="submit" name="button" class="btn btn-success float-right mb-4">Submit</button>
      </div>
  </form>
</div>
@endsection
@section('footer_all')
  @include('partials.footer')
@endsection
