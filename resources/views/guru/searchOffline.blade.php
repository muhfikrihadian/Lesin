@extends('layouts.master_guru')
@section('title', 'Hasil Pencarian')
@section('content')
<div class="container py-5" id="hasil_cari">
  <div class="row position-relative justify-content-between align-items-start m-0 height-full">
    <!-- filter guru ditampilan tablet dan desktop -->
    <aside class="col-12 col-md-3 card shadow-sm px-1 py-3">
      <form action="{{ route('guru.searchOfflineFilter') }}" method="POST" class="p-3">
      {{ csrf_field() }}
        <div class="mb-4">
          <label for="jenjang">Jenjang Sekolah</label>
          <select name="jenjang" id="jenjang" class="custom-select">
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA">SMK</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="matpel">Mata Pelajaran</label>
          <select name="pelajaran" id="matpel" class="custom-select">
            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
            <option value="Matematika">Matematika</option>
            <option value="Bahasa Inggris">Bahasa Inggris</option>
            <option value="IPA">IPA</option>
            <option value="IPS">IPS</option>
            <option value="Others">Others</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="kategori_pelajaran">Materi Pelajaran</label>
          <input type="search" name="materi" class="form-control" placeholder="Cari Materi Pelajaran" id="kategori_pelajaran">
        </div>
        <button type="submit" name="button" class="btn btn-success w-100">Cari Murid</button>
      </form>
    </aside>
    <!-- end of filter guru ditampilan tablet dan desktop-->
    <section class="col-12 col-md-8 float-right">
      <div class="row flex-column">
        @if(isset($filter))
        @foreach($filter as $hasil)
          <article class="col-12 mb-3 card shadow-sm p-0">
            <figure class="m-0 p-3 height-full">
                  <img src="{{ asset('photoguru/'.$order->photo_murid) }}" height="50" class="float-left mr-3">
                  <figcaption class="position-relative">
                    <strong class="d-block">{{ $filter[0]->studentname }}</strong>
                    <em class="d-block text-secondary my-1">Nama Pelajaran <strong>{{ $filter[0]->pelajaran }}</strong></em>
                    <em class="d-block text-secondary my-1 materi_pelajaran">Materi Pelajaran <strong>{{ $filter[0]->kategori_pelajaran }}</strong></em>
                    <span class="text-info text-capitalize">
                      harga : <var class="font-weight-bold" style="color: #DE891A;">{{ $filter[0]->lesco }} Lesco</var>
                    </span>
                  </figcaption>
            </figure>
            <div class="py-2 text-center border-top" style="background-color: #D0D0D0;">
              <a href="{{route('guru.searchOfflineDetail', ['id' => $order->id])}}">Lihat Lebih Lanjut</a>
            </div>
          </article>
          @endforeach
          <h1>Terbaru</h1>
        @else
        @foreach($orders as $order)
          <article class="col-12 mb-3 card shadow-sm p-0">
            <figure class="m-0 p-3 height-full">
                  <img src="{{ asset('photoguru/'.$order->photo_murid) }}" height="50" class="float-left mr-3">
                  <figcaption class="position-relative">
                    <strong class="d-block">{{ $order->studentname }}</strong>
                    <em class="d-block text-secondary my-1">Nama Pelajaran <strong>{{ $order->pelajaran }}</strong></em>
                    <em class="d-block text-secondary my-1 materi_pelajaran">Materi Pelajaran <strong>{{ $order->kategori_pelajaran }}</strong></em>
                    <span class="text-info text-capitalize">
                      harga : <var class="font-weight-bold" style="color: #DE891A;">{{ $order->lesco }} Lesco</var>
                    </span>
                  </figcaption>
            </figure>
            <div class="py-2 text-center border-top" style="background-color: #D0D0D0;">
              <a href="{{route('guru.searchOfflineDetail', ['id' => $order->id])}}">Lihat Lebih Lanjut</a>
            </div>
          </article>
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
@section('script')
  <script>
  $(document).ready(function(){
    //form search
    var productSource = [
      @foreach ($orders as $order)
         "{{ $order->kategori_pelajaran }}",
      @endforeach
    ];
    $("input[name='kategori_pelajaran']").autocomplete({
      source: productSource
    });
  });
  </script>
@endsection
