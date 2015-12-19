@extends('layouts.master')

@section('content')

	<h3>{{ $customer->email }}

		<small>Added on {{ $customer->created_at }} </small>
	</h3>

	@include('forms.add_order')

	<h4>Existing Orders</h4>

	<table class="table table-striped">

		<thead>
			<tr>
				<th>ID</th>
				<th>Quantity</th>
				<th>Amount</th>
				<th>Postage</th>
				<th>Date</th>
			</tr>
		</thead>

		<tbody>
			
			@foreach ($customer->orders()->get() as $order)

				<tr>
					<td>{{ $order->id }}</td>
					<td>{{ $order->quantity }}</td>
					<td>{{ $order->amount }}</td>
					<td>{{ $order->postage }}</td>
					<td>{{ $order->created_at }}</td>
				</tr>

			@endforeach
			
		</tbody>

	</table>

@stop