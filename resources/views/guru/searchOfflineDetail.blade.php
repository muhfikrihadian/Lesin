@extends('layouts.master_guru')
@section('title', 'Detail Order')
@section('content')
<div class="container py-0" id="order_page">
  <div class="row">
    <div class="col-12 col-md-4 order-md-2 py-md-5">
      <figure class="p-3 p-md-0 m-0 text-center position-relative">
      @foreach($orders as $order)
        <img src="{{ asset('photoguru/'.$order->photo_murid) }}" height="90" alt="" class="">
        <figcaption class="pt-2 text-center mt-0">
          <h2 class="mb-2">{{ $order->studentname }}</h2>
          <span class="d-block mb-2 text-secondary">Nomor Telephone {{ $order->nmr_murid }}</span>
            <address class="m-0 text-left">
              <i class='bx bxs-map font-weight-bold' style="color: #DE891A;"></i>
              {{ $order->alamat }}
            </address>
        </figcaption>
        @endforeach
      </figure>
    </div>
    <div class="col-12 col-md-8 py-5 order-md-1">
      <h1 class="col-12 px-0 pb-md-4 text-dark font-weight-bold">Detail Pemesanan</h1>

      @foreach($orders as $order)
      <div class="form-row">
        <div class="form-group col">
          <label for="staticEmail" class="text-uppercase text-secondary">Jenjang Pendidikan</label>
          <input type="text" readonly class="form-control-plaintext text-success font-weight-bold" id="staticEmail" value="{{ $order->jenjang }}">
        </div>
        <div class="form-group col">
          <label for="staticEmail" class="text-uppercase text-secondary">Pelajaran</label>
          <input type="text" readonly class="form-control-plaintext text-success font-weight-bold" id="staticEmail" value="{{ $order->pelajaran }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col">
          <label for="staticEmail" class="text-uppercase text-secondary">Durasi</label>
          <input type="text" readonly class="form-control-plaintext text-success font-weight-bold" id="staticEmail" value="{{ $order->durasi }} Jam">
        </div>
        <div class="form-group col">
          <label for="staticEmail" class="text-uppercase text-secondary">Tarif Lesco</label>
          <input type="text" readonly class="form-control-plaintext text-success font-weight-bold" id="staticEmail" value="{{ $order->lesco }} Coin">
        </div>
      </div>
      <div class="form-group">
        <label for="">Alamat Lengkap</label>
        <textarea name="alamat" rows="3" class="form-control" disabled>{{ $order->alamat }}</textarea>
      </div>
      <div class="form-group">
        <label for="staticEmail">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="form-control" disabled>{{ $order->deskripsi }}</textarea>
      </div>
      @endforeach


      @foreach($orders as $order)
      @if (($order->status != "Process")&&($order->status != "Success")&&($order->status != "Waiting")&&($order->status == "Accept"))
      <form action="{{ route('guru.searchOfflineProses') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" value="{{ $order->id }}" name="idOrder">
        <button type="submit" name="button" class="btn btn-success">Mulai Belajar</button>
      </form>
      @elseif ($order->status == "Waiting")
      <form action="{{ route('guru.searchOfflineTake') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" value="{{ $order->id }}" name="idOrder">
        <input type="hidden" class="form-control" value="{{ Auth::user()->name }}" name="teacherName">
        <button type="submit" name="button" class="btn btn-success">Ambil Tugas</button>
      </form>
      @elseif($order->status === "Process")
      <form action="{{ route('guru.searchOfflineFinished') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" value="{{ $order->id }}" name="idOrder">
        <input type="hidden" class="form-control" value="{{ $order->lesco }}" name="lesco">
        <button type="submit" name="button" class="btn btn-danger">Sudahi Belajar</button>
      </form>
      @endif
      @endforeach

    </div>
  </div>
  @endsection
  @section('footer_all')
    @include('partials.footer')
  @endsection
