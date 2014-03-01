<!DOCTYPE html>
<html>
<head>
	<title>Ticketify</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<style>
	body, html {
		width: 100%;
		height: 100%;
	}
	.form-signin, .form-width {
		max-width: 330px;
	}

	.center-text {
		text-align: center;
	}

	.inline-headers {
		display: inline;
	}

	.btn-buy {
		margin-top: 30px;
		margin-bottom: 20px;
	}

	.navbar-landing, .navbar-landing li a {
		color: #adadad !important;
		background: none;
		border: none;
	}

	.navbar-landing li a:hover {
		color: #c8c8c8 !important;
	}

	.landing-page {
		background: url('assets/img/main.JPG');
	    background-position: 50% 35%;
		width: 100%;
		height: 100%;
		top:0;
		position: absolute;
	}

	.footer {
		margin-top: 20px;
	}
	</style>
</head>
<body>



	@include('layout.navigation')



	@if(Session::has('global'))
	<div class="container">
		<div class="alert alert-warning">{{ Session::get('global') }}</div>
	</div>
	@endif

	@yield('content')

	<footer>
	<div class="container center-text footer">
	Written with ♥ in Laravel.
	</div>
	</footer>
</body>
</html>