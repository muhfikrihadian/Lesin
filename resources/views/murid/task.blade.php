@extends('layouts.master_siswa')
@section('title', 'Hasil Pencarian')
@section('content')
<div class="container py-5" id="task_page">
  <div class="row justify-content-between m-0">
    @if(count($orders) > 0)
    <section class="col-12">
      @foreach($orders as $order)
        <a href="{{route('murid.detail', ['id' => $order->id])}}" class="no-underline card-task">
          <article class="col-12 mb-4 card p-0 bg-white">
            <div class="detail_pesanan p-3 position-relative">
              @foreach ($profile_murid as $profile)
                <img src="{{ asset('photoguru/'.$profile->photo) }}" height="80" class="d-block mb-2 float-md-left mr-md-3">
              @endforeach
              <h2>{{ $order->studentname }}</h2>
              <p class="m-0 text-secondary text-left">Pelajaran {{ $order->pelajaran }}</p>
              <span class="my-1 font-weight-bold" style="color: #16A658;">Les {{ $order->type }}</span>
            </div>
            <div class="detail_tambahan border-top d-flex justify-content-between p-3">
              <span>Status : {{ $order->status }}</span>
              @if($order->created_at)
                <span class="text-dark">Pesanan Pada Tanggal <time class="text-info">{{$order->created_at->format('d F Y') }}</time></span>
              @endif
              <span class="text-info">
                Harga : <var class="font-weight-bold" style="color: #DE891A;">{{ $order->lesco }} Lesco</var>
              </span>
            </div>
          </article>
        </a>
      @endforeach
    </section>
    <div class="row m-0">
      <div class="col">
        {{ $orders->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
    @else
    <div class="alert alert-warning w-100 text-center font-weight-bold" role="alert">
      Kamu Belum Pernah Memesan Guru
    </div>
    @endif
  </div>
</div>
@endsection
@section('footer_all')
  @include('partials.footer')
@endsection
