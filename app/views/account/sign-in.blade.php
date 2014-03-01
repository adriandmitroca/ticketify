@extends('layout.main')

@section('content')
	<h2 class="center-text">Sign in</h2>
	<form class="form-signin center-block" action="{{ URL::route('account-sign-in') }}" method="post">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" name="email" {{ Input::old('email') ? ' value="' . Input::old('email') . '"' : '' }}>
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" {{ Input::old('password') ? ' value="' . Input::old('password') . '"' : '' }}>
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif		
		</div>
		 <div class="checkbox">
    		<label>
      			<input type="checkbox" name="remember"> Remember me
    		</label>
		{{ Form::token() }}
		<input type="submit" class="btn btn-default center-block" value="Sign in">
	</form>
@stop