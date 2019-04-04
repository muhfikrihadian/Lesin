@extends('layouts.master_guru')
@section('title', 'Hasil Pencarian')
@section('content')
<div class="container py-5" id="hasil_cari">
  <div class="row position-relative justify-content-between m-0 height-full">
    <!-- filter guru ditampilan tablet dan desktop -->
    <aside class="col-12 col-md-3 card shadow-sm px-1 py-3">
      <form action="" class="p-3">
        <div class="mb-4">
          <label for="jenjang">Jenjang Sekolah</label>
          <select name="" id="jenjang" class="custom-select">
            <option value="">SD</option>
            <option value="">SMP</option>
            <option value="">SMK</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="matpel">Mata Pelajaran</label>
          <select name="" id="matpel" class="custom-select">
            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
            <option value="Matematika">Matematika</option>
            <option value="Bahasa Inggris">Bahasa Inggris</option>
            <option value="IPA">IPA</option>
            <option value="IPS">IPS</option>
            <option value="Others">Others</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="list_harga">Cari Berdasarkan :</label>
          <select name="" id="list_harga" class="custom-select">
            <option value="">Termahal</option>
            <option value="">Termudah</option>
            <option value="">Bintang Terbaik</option>
          </select>
        </div>
        <button type="submit" name="button" class="btn btn-success w-100">Cari Murid</button>
      </form>
    </aside>
    <!-- end of filter guru ditampilan tablet dan desktop-->
    <section class="col-12 col-md-8 float-right">
      <div class="row flex-column">
        @if(isset($orders))
        @foreach($orders as $order)
        <a href="{{route('guru.searchOfflineDetail', ['id' => $order->id])}}">
          <article class="col-12 mb-3 card shadow-sm px-0 mx-0">
            <div class="row flex-sm-column flex-md-row mx-0">
              <div class="col-sm-12 col-md-8 height-full px-0 py-md-3 pl-md-3">
                <figure class="m-0 position-relative p-3 p-md-0 row m-0 align-items-center justify-content-center text-center height-full ">
                  <img src="{{ asset('img/people.png') }}" height="50" alt="" class="float-left">
                  <figcaption class="pt-2">
                    <strong class="d-block text-center">{{ $order->studentname }}</strong>
                    <em class="d-block text-secondary my-1">{{ $order->pelajaran }}</em>
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
