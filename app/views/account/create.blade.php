@extends('layout.main')

@section('content')
	<h2 class="center-text">Create your account</h2>
	<form class="form-signin center-block" action="{{ URL::route('account-create') }}" method="post">
		<div class="form-group">
			Email: <input type="text" class="form-control" name="email" {{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }}>
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
		</div>

		<div class="form-group">
			Username: <input type="text" class="form-control" name="username" {{ (Input::old('username')) ? ' value="' . e(Input::old('username')) . '"' : '' }}>
			@if($errors->has('username'))
				{{ $errors->first('username') }}
			@endif
		</div>

		<div class="form-group">
			Password: <input type="password" class="form-control" name="password" {{ (Input::old('password')) ? ' value="' . e(Input::old('password')) . '"' : '' }}>
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif
		</div>

		<div class="form-group">
			Password again: <input type="password" class="form-control" name="password_again" {{ (Input::old('password_again')) ? ' value="' . e(Input::old('password_again')) . '"' : '' }}>
			@if($errors->has('password_again'))
				{{ $errors->first('password_again') }}
			@endif
		</div>

		{{ Form::token() }}
		<input type='submit' class="btn btn-default center-block" value="Create account">
	</form>
@stop