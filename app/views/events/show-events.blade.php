@extends('layout.main')

@section('content')
<div class="container">
<h1>Events</h1>
<table class="table table-striped table-bordered table-hover">
<thead>
	<tr>
		<th>#</th>
		<th>Artist</th>
		<th>Location</th>
		<th>Venue</th>
		<th>Date</th>
		<th>Price</th>
		<th></th>
	</tr>
</thead>
<tbody>
@foreach ($events as $event)
<tr>
	<td>{{ $event->id }}</td>
	<td>{{ $event->artist }}</td>
	<td>{{ $event->city }}, {{ $event->country }}</td>
	<td>{{ $event->venue }}</td>
	<td>{{ $event->time }}</td>
	<td>{{ $event->price }}$</td>
	<td>
		<a class="btn btn-primary btn-sm" href="{{ URL::route('event-details', $event->id) }}">Details</a>
		<a class="btn btn-success btn-sm" href="{{ URL::route('event-buy', $event->id) }}">Buy</a>	
	</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@stop