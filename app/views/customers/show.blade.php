@extends('layouts.master')

@section('content')

	<h3>{{ $customer->email }}

		<small>added on {{ $customer->created_at }} </small>
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
			
			@foreach ($customer->orders()->orderBy('id', 'desc')->get() as $order)

				<tr>
					<td>{{ $order->id }}</td>
					<td>{{ $order->quantity }}</td>
					<td>&pound;{{ $order->amount }}</td>
					<td>&pound;{{ $order->postage }}</td>
					<td>{{ $order->created_at }}</td>
				</tr>

			@endforeach

			<tr>
				<th>Totals</th>
				<th>{{ $customer->get_totals()->quantity }}</th>
				<th>&pound;{{ number_format($customer->get_totals()->amount, 2) }}</th>
				<th>&pound;{{ number_format($customer->get_totals()->postage, 2) }}</th>
				<th></th>
			</tr>
			
		</tbody>

	</table>

@stop