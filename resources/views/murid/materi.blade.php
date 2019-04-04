@extends('layouts.master_siswa')
@section('title', 'Hasil Pencarian')
@section('content')
@if(isset($videos))
@foreach($videos as $video)
<div class="container">
	<div class="row" style="height: calc(100vh - 2rem - 67px);">
		<div class="embed-responsive embed-responsive-16by9" style="height: 100%">
		  <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" frameborder="0" class="embed-responsive-item" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" style="height: 100%;" allowfullscreen></iframe>
		</div>
	</div>
</div>
@endforeach
@endif
@endsection
@section('footer_all')
  @include('partials.footer')
@endsection
