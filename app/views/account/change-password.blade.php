@extends('layout.main')

@section('content')
<div class="container">
<ul class="nav nav-pills">
	<li><a href="{{ URL::route('account-settings') }}">Edit settings</a></li>
	<li class="active"><a href="{{ URL::route('account-change-password') }}">Change password</a></li>
</ul>

<h2 class="center-text">Change password</h2>
	<form class="form-signin center-block" action="{{ URL::route('account-change-password') }}" method="post">
		<div class="form-group">
			<label>Old password</label>
			<input type="password" class="form-control" name="old_password">
			@if($errors->has('old_password'))
				{{ $errors->first('old_password') }}
			@endif
		</div>
		<div class="form-group">
			<label>New password</label>
			<input type="password" class="form-control" name="new_password">
			@if($errors->has('new_password'))
				{{ $errors->first('new_password') }}
			@endif
		</div>
		<div class="form-group">
			<label>Password again</label>
			<input type="password" class="form-control" name="new_password_again">
			@if($errors->has('new_password_again'))
				{{ $errors->first('new_password_again') }}
			@endif
		</div>
			{{ Form::token() }}
			<input type="submit" class="btn btn-default center-block" value="Change password">
		</form>
</div>
@stop