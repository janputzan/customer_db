@extends('layouts.master')

@section('content')

	<div class="box box-primary">

		<div class="box-header">
			<h3>All Customers</h3>
		</div>

		<div class="box-body">

			<table class="table table-striped customers-table table-bordered">

				<thead>
					<tr>
						<th>ID</th>
						<th>Email</th>
						<th>Total Orders</th>
						<th>Total Amount</th>
						<th>Total Postage</th>
						<th>Date Added</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach ($customers as $customer)

						<tr>
							<td>{{ $customer->id }}</td>
							<td><a href="{{ route('customer.show', array('id' => $customer->id)) }}">{{ $customer->email }}</a></td>
							<td>{{ $customer->get_totals()->quantity }}</td>
							<td>&pound;{{ number_format($customer->get_totals()->amount, 2) }}</td>
							<td>&pound;{{ number_format($customer->get_totals()->postage, 2) }}</td>
							<td>{{ $customer->created_at }}</td>
						</tr>

					@endforeach

				
					
				</tbody>

			</table>
		</div>

	</div>

	<hr />

	<div class="box box-primary">

		<div class="box-header">
			<h3>All Orders</h3>
		</div>

		<div class="box-body">

			<table class="table table-striped orders-table table-bordered">

				<thead>
					<tr>
						<th>Customer Email</th>
						<th>Quantity</th>
						<th>Amount</th>
						<th>Postage</th>
						<th>Date</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach ($orders as $order)

						<tr>
							<td><a href="{{ route('customer.show', array('id' => $order->customer->id)) }}">{{ $order->customer->email }}</a></td>
							<td>{{ $order->quantity }}</td>
							<td>&pound;{{ $order->amount }}</td>
							<td>&pound;{{ $order->postage }}</td>
							<td>{{ $order->created_at }}</td>
						</tr>

					@endforeach

				
					
				</tbody>

			</table>
		</div>

	</div>

@stop

@section('scripts')

<script type="text/javascript">

	$(function () {
		$('.orders-table').dataTable({
			"paginate": true,
			"lengthChange": true,
			"filter": true,
			"sort": true,
			"info": true,
			"autoWidth": true,
			"order": [[ 0, "desc" ]],
			"columns": [
				{ "sortable": true },
				{ "sortable": false },
				{ "sortable": false },
				{ "sortable": false },
				{ "sortable": true },
			]
		});

		$('.customers-table').dataTable({
			"paginate": true,
			"lengthChange": true,
			"filter": true,
			"sort": true,
			"info": true,
			"autoWidth": true,
			"order": [[ 0, "desc" ]],
			"columns": [
				{ "sortable": true },
				{ "sortable": true },
				{ "sortable": false },
				{ "sortable": false },
				{ "sortable": false },
				{ "sortable": true },
			]
		});
	});

</script>
@stop