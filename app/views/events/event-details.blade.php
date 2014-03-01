@extends('layout.main')

@section('content')
<div class="container">
	<div class="details pull-left">
		<h1>{{ $event->artist .' @ '. $event->venue }} <span class="label label-info">{{ $event->price }}$</span></h1>
		@if($event->support)
		<h3>with supporting: {{ $event->support }}</h3>
		@endif
	</div>
	<div class="details pull-right">
		<a class="btn btn-danger btn-lg btn-buy pull-right" href="{{ URL::route('event-buy', $event->id) }}">Buy now</a>
		<table class="table pull-right">
			<thead>
			<tr>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
				<tr><td>Place:</td>
					<td>{{ $event->venue .', '. $event->city .', '.  $event->country}}</td>
				</tr>
				<tr><td>Date:</td>
					<td>{{ $event->time }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<div class="clearfix"></div>
	<div class="panel panel-default">
	  <div class="panel-heading">Details</div>
	  <div class="panel-body">
	    {{ $event->description }}
	  </div>
	</div>
</div>
@stop