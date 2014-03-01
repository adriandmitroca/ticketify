@extends('layout.main')

@section('content')
<div class="container">
<h1>Your orders</h1>
<table class="table table-striped table-bordered table-hover">
<thead>
	<tr>
		<th>Order ID</th>
		<th>Event</th>
		<th>Order time</th>
		<th>Price</th>
	</tr>
</thead>
<tbody>
@foreach ($orders as $order)
<tr>
	<td>{{ $order->order_id }}</td>
	<td><a href="{{ URL::route('event-details', $order->event->id) }}">{{ $order->event->artist }}</a></td>
	<td>{{ $order->order_time }} </td>
	<td>{{ $order->price }}</td>
</tr>
@endforeach
</tbody>
</table>
</div>

@stop