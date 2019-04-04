@extends('layouts.master_siswa')
@section('title', 'Detail Order')
@section('content')
<div class="container py-0" id="order_page">
  <div class="row">
    <div class="col-12 col-md-4 order-md-2 py-md-5">
      <figure class="p-3 p-md-0 m-0 text-center position-relative" style="top: 10%;transform: translateY(-50%)">
      @if(isset($orders))
      @foreach($orders as $order)
        <img src="{{ asset('photoguru/'.$order->photo_murid) }}" height="90" alt="" class="">
        <figcaption class="pt-2 text-center mt-0">
          <h2 class="m-0">{{ $order->teachername }}</h2>
          @endforeach
      @endif
      @foreach ($orders as $order)
        @if ($order->type == 'Offline')
          <address class="m-0">
            <i class="bx bxs-map font-weight-bold"></i>
            {{ $order->alamat }}
          </address>
        @endif
      @endforeach
        </figcaption>
      </figure>
    </div>
    <div class="col-12 col-md-8 py-5 order-md-1">
      <h1 class="col-12 px-0 pb-md-4 h3 text-dark font-weight-bold">Detail Pemesanan {{ $order->created_at->format('d F Y') }}</h1>
      @if(isset($orders))
        @foreach($orders as $order)
        <div class="row">
          <div class="col">
            <p class="text-secondary">Mata Pelajaran<br><span class="text-success font-weight-bold text-capitalize">{{ $order->pelajaran }}</span></p>
          </div>
          <div class="col">
            <p class="text-secondary">Materi Pelajaran<br><span class="text-success font-weight-bold text-capitalize">{{ $order->kategori_pelajaran }}</span></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p class="text-secondary">Jenjang Pendidikan<br><span class="text-success font-weight-bold text-uppercase">{{ $order->jenjang }}</span></p>
          </div>
          <div class="col">
            <p class="text-secondary">Tipe Pesanan Guru<br><span class="text-success font-weight-bold text-capitalize">Les {{ $order->type }}</span></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p class="text-secondary">Durasi<br><span class="text-success font-weight-bold">{{ $order->durasi }} Jam</span></p>
          </div>
          <div class="col">
            <p class="text-secondary">Tarif Lesco<br><span class="text-success font-weight-bold">{{ $order->lesco }} Coin</span></p>
          </div>
        </div>
        @if ($order->type == 'Offline')
        <div class="row">
          <div class="col">
            <label class="text-secondary mb-1">Alamat Ketemuan</label>
            <address class="font-weight-bold text-success">{{ $order->alamat }}</address>
          </div>
        </div>
        @endif
        <div class="row mb-3" id="deskripsi_pesanan">
          <div class="col">
            <label for="deskripsi" class="text-secondary">Deskripsi Pesanan</label>
            <p class="text-success font-weight-bold text-capitalize">{{ $order->deskripsi }}</p>
          </div>
        </div>
        @if($order->status === "Process")
        <form action="{{ route('murid.createOfflineFinished') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" value="{{ $order->id }}" name="idOrder">
          <button type="submit" name="button" class="btn btn-danger">Sudahi Belajar</button>
        </form>
        @endif
        @endforeach
      @endif
    </div>
  </div>
  @endsection
  @section('footer_all')
    @include('partials.footer')
  @endsection
