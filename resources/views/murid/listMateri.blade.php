@extends('layouts.master_siswa')
@section('title', 'Hasil Pencarian')
@section('content')
<div class="container position-relative" id="hasil_cari">
    <div class="row justify-content-between m-0">
      <div class="col-12 col-md-3 card px-0 d-md-none" id="filter_guru_mobile">
        <div class="btn_filter_guru">
          <a href="javascript:void(0);" class="btn btn-warning" id="show_filter">Filter Pencarian</a>
        </div>
        <form action="" class="d-flex flex-column p-0">
          <div class="form-group">
            <label for="">Jenjang Sekolah</label>
            <select name="" id="jenjang" class="custom-select">
              <option value="">SD</option>
              <option value="">SMP</option>
              <option value="">SMK</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Mata Pelajaran</label>
            <select name="" id="matpel" class="custom-select">
              <option value="">mtk</option>
              <option value="">ipa</option>
              <option value="">bahasa ing</option>
              <option value="">bahasa indo</option>
              <option value="">agama islam</option>
              <option value="">agama katholik</option>
              <option value="">agama protestan</option>
              <option value="">pelajaran</option>
              <option value="">pelajaran</option>
              <option value="">pelajaran</option>
              <option value="">pelajaran</option>
              <option value="">pelajaran</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Rentang Harga</label>
            <select class="custom-select" name="">
              <option value="">300.000IDR - 400.000IDR</option>
              <option value="">400.000IDR - 600.000IDR</option>
              <option value="">600.000IDR - 900.000IDR</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Kota / Kabupaten</label>
            <select name="" id="kotkab" class="custom-select">
              <option value="">Jakarta Selatan</option>
              <option value="">Jakarta Timur</option>
              <option value="">Jakarta Barat</option>
            </select>
          </div>
          <button type="submit" name="button" class="btn btn-success mb-4">Cari Guru</button>
          <a href="javascript:void(0)" class="btn btn-outline-warning" id="close_filter_guru">Batalkan</a>
        </form>
      </div>
      <!-- end of filter guru ditampilan mobile dan tablet-->
      <!-- filter guru ditampilan tablet dan desktop -->
      <aside class="col-12 col-md-3 card shadow-sm px-0 py-1 d-none d-md-block align-selft-start bg-light" id="filter_guru_desktop">
        <form action="" class="p-3">
          <div class="form-group">
            <label for="">Jenjang Sekolah</label>
            <select name="" id="jenjang" class="custom-select">
              <option value="">SD</option>
              <option value="">SMP</option>
              <option value="">SMK</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Mata Pelajaran</label>
            <select name="" id="matpel" class="custom-select">
              <option value="">mtk</option>
              <option value="">ipa</option>
              <option value="">bahasa ing</option>
              <option value="">bahasa indo</option>
              <option value="">agama islam</option>
              <option value="">agama katholik</option>
              <option value="">agama protestan</option>
              <option value="">pelajaran</option>
              <option value="">pelajaran</option>
              <option value="">pelajaran</option>
              <option value="">pelajaran</option>
              <option value="">pelajaran</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Rentang Harga</label>
            <select class="custom-select" name="">
              <option value="">300.000IDR - 400.000IDR</option>
              <option value="">400.000IDR - 600.000IDR</option>
              <option value="">600.000IDR - 900.000IDR</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Kota / Kabupaten</label>
            <select name="" id="kotkab" class="custom-select">
              <option value="">Jakarta Selatan</option>
              <option value="">Jakarta Timur</option>
              <option value="">Jakarta Barat</option>
            </select>
          </div>
          <div class="form-row justify-content-between">
            <button type="submit" name="button" class="btn btn-success col-12 mb-3 mb-lg-0 col-lg-5">Cari Guru</button>
            <button type="reset" class="btn btn-outline-warning col-12 col-lg-5">Reset Filter</button>
          </div>
        </form>
      </aside>
      <!-- end of filter guru ditampilan tablet dan desktop-->
      <section class="col-12 col-md-8" id="">
        <div class="row align-items-center mb-3">
          <form action="" class="form-inline col-12 px-0">
            <label for="" class="mr-2">Cari Berdasarkan :</label>
            <select name="" id="" class="custom-select">
              <option value="">Termahal</option>
              <option value="">Termudah</option>
              <option value="">Bintang Terbaik</option>
            </select>
          </form>
        </div>
        <div class="row flex-column">
            @if(isset($orders))
            @foreach($orders as $order)
            <a href="{{route('guru.searchOfflineDetail', ['id' => $order->id])}}">
          <article class="col-12 mb-3 card shadow-sm px-0 mx-0 bg-light">
            <div class="row flex-sm-column flex-md-row mx-0">
              <div class="col-sm-12 col-md-8 height-full px-0 py-md-3 pl-md-3">
                <figure class="m-0 position-relative p-3 p-md-0 row m-0 align-items-center justify-content-center text-center height-full ">
                  <img src="{{ asset('img/people.png') }}" height="50" alt="" class="float-left">
                  <figcaption class="pt-2">
                    <strong class="d-block text-center">{{ $order[0]->guru }}</strong>
                    <em class="d-block text-secondary my-1">{{ $order->judul }}</em>
                    <address class="m-0 text-left">
                      {{ $order->deskripsi }}
                    </address>
                  </figcaption>
                </figure>
              </div>
              <div class="d-md-flex align-items-center text-center justify-content-center col-sm-12 col-md-4 px-0 py-2 p-md-3 text-capitalize">
                <span class="text-info">
                  harga <var class="ml-md-2 d-block font-weight-bold" style="color: #DE891A;">{{ $order->lesco }} Lesco</var>
                </span>
              </div>
            </div>
          </article>
          </a>
            @endforeach
          @endif
        </div>
      </section>
    </div>
  </div>
@endsection
@section('footer_all')
  @include('partials.footer')
@endsection
