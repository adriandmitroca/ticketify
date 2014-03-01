<nav class="navbar navbar-default navbar-static-top {{ Request::is('/') ? 'navbar-landing' : '' }}">
<div class="container">
	<a class="navbar-brand" href='{{ URL::route('home') }}'>Ticketify</a>
	<ul class="nav navbar-nav">
		<li><a href='{{ URL::route('home') }}'>Home</a></li>
		<li><a href='{{ URL::route('events') }}'>Events</a></li>
		@if(Auth::check())
		<li><a href='{{ URL::route('orders') }}'>My orders</a></li>
		@else

		@endif
	</ul>

		<ul class="nav navbar-nav navbar-right">
			@if(Auth::check())
				<li><a href="#">Hello, {{ Auth::user()->address->first_name ? Auth::user()->address->first_name : Auth::user()->username }}!</a></li>
				<li><a href='{{ URL::route('account-settings') }}'>Edit Profile</a></li>
				<li><a href="{{ URL::route('account-sign-out') }}">Sign out</a></li>
			@else
				<li><a href="{{ URL::route('account-create') }}">Sign up</a></li>
				<li><a href="{{ URL::route('account-sign-in') }}">Sign in</a></li>
			@endif
		</ul>
</div>
</nav>