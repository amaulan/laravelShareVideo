<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SobatDev</title>
</head>
	<link href="{{ url('assets/bootstrap/css/flatbst.css') }}" rel="stylesheet">
	<link href="{{ url('assets/bootstrap/css/my.css') }}" rel="stylesheet">
	<script src="{{ url('assets/js/jquery.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
<body style="padding:0px;">
	
	@include('pages.interface.headnav')

	@yield('body')

	@include('pages.interface.footnav')

</body>
</html>