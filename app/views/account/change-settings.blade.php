@extends('layout.main')

@section('content')
<div class="container">
<ul class="nav nav-pills">
	<li class="active"><a href="{{ URL::route('account-settings') }}">Edit settings</a></li>
	<li><a href="{{ URL::route('account-change-password') }}">Change password</a></li>
</ul>

<h1 class="center-text">Update your profile</h1>

<form class="form-width center-block" action="{{ URL::route('account-settings') }}" method="post">
			<div class="form-group">
				<label for="email">E-mail address</label>
				<input type="text" class="form-control" name="email" {{ isset($user->email) ? ' value="' . $user->email . '"' : '' }}>
				@if($errors->has('email'))
						{{ $errors->first('email') }}
					@endif		
				</div>
				<div class="form-group">
					<label for="first-name">First name</label>
					<input type="text" class="form-control" name="first_name" {{ isset($user->address->first_name) ? ' value="' . $user->address->first_name . '"' : '' }}>
					@if($errors->has('first_name'))
						{{ $errors->first('first_name') }}
					@endif
				</div>
				<div class="form-group">
					<label for="password">Last name</label>
					<input type="text" class="form-control" name="last_name" {{ isset($user->address->last_name) ? ' value="' . $user->address->last_name . '"' : '' }}>
				@if($errors->has('last_name'))
					{{ $errors->first('last_name') }}
				@endif		
			</div>
			<div class="form-group">
				<label for="password">Address</label>
				<input type="text" class="form-control" name="address" {{ isset($user->address->address) ? ' value="' . $user->address->address . '"' : '' }}>
				@if($errors->has('address'))
					{{ $errors->first('address') }}
				@endif		
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" class="form-control" name="city" {{ isset($user->address->city) ? ' value="' . $user->address->city . '"' : '' }}>
				@if($errors->has('city'))
					{{ $errors->first('city') }}
				@endif		
			</div>
			<div class="form-group">
				<label for="zip-code">Zip code</label>
				<input type="text" class="form-control" name="zip_code" {{ isset($user->address->zip_code) ? ' value="' . $user->address->zip_code . '"' : '' }}>
				@if($errors->has('zip_code'))
					{{ $errors->first('zip_code') }}
				@endif		
			</div>
			<div class="form-group">
				<label for="password">Phone number</label>
				<input type="text" class="form-control" name="phone" {{ isset($user->address->phone) ? ' value="' . $user->address->phone . '"' : '' }}>
				@if($errors->has('phone'))
					{{ $errors->first('phone') }}
				@endif		
			</div>
			{{ Form::token() }}
			<input type="submit" class="btn btn-default center-block" value="Update">
</form>
</div>
@stop