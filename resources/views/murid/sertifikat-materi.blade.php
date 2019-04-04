<!DOCTYPE html>
<html>
<head>
	<title>Sertifikasi</title>
	<style media="screen">
		* {
			box-sizing: border-box;
			padding: 0;
			margin: 0;
			list-style: none;
			outline: none;
		}
		body {
			padding: 20px 0;
		}
		h1:first-child {
			text-align: center;
		}
		h3:first-child {
			text-align: left;
		}
		ul li {
			color: #159932;
			font-weight: bold;
		}
		footer {
			background-color: #0C414F;
			color: white;
			width: 100%;
			padding: 20px 0;
		}
	</style>
</head>
<body>
	<h1 >Sertifikasi Penyelesaian</h1>
	<h3>Sertifikat ini menunjukan bahwa</h3>

	@foreach($users as $user)
	<h1>{{ $user->name }}</h1>
	@endforeach

	<h3>sudah menyelesaikan</h3>

	@foreach($videos as $video)
	<ul>
		<li>{{ $video->judul }}</li>
	</ul>
	<h3>dari</h3>
	<h2>{{ $video->guru }}</h2>
	@endforeach
	<footer>Sertifikat by Lesin</footer>
</body>
</html>
