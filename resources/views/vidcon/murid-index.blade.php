<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Video Conference</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/vidkon.css') }}">
</head>
<body>
	@include('partials.navbar')
	<main class="card shadow-sm mx-auto p-4">
		<h1 class="h4 mb-4 text-center">Selamat Datang Divideo Konferensi <strong>Lesin</strong></h1>
		<form action="{{ route('murid.room.join') }}" class="form-inline justify-content-center" method="post">
            {{ csrf_field() }}
				<input type="text" class="form-control col-4 mr-4" name="roomName" placeholder="Room Name" autofocus required>
				<input id="room_password" type="password" class="form-control col-4 mr-4" name="room_password" placeholder="Password" required>
				@if ($errors->has('room_password'))
				<span class="invalid-feedback mr-2" role="alert">
				 <strong>{{ $errors->first('room_password') }}</strong>
				</span>
				@endif
			<button type="submit" name="button" class="btn btn-primary">Bergabung Sekarang</button>
		</form>
	</main>
	<script src="{{ asset('js/jquery.js') }}" charset="utf-8"></script>
	<script src="{{ asset('js/popper.min.js') }}" charset="utf-8"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}" charset="utf-8"></script>
	<script>
		$(document).ready(function() {
			​$('input[name="roomName"]').keypress(function( e ) {
				if(e.which === 32)
					return false;
			})​​​​​;​
		});
	</script>
</body>
</html>
