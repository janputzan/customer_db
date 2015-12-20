{{ Form::open(array('route' => array('customer.store_order', $customer->id))) }}

	<h2 class="form-signin-heading">Add New Order</h2>

	<div class="form-group">

		{{ Form::label('quantity', 'Quantity', array('class' => 'sr-only')) }}

		{{ Form::text('quantity', Input::old('quantity'), array('class' => 'form-control', 'placeholder' => 'Quantity')) }}

		<span class="errors">{{ array_key_exists('quantity', $errors) ? $errors['quantity'] : '' }}</span>

	</div>

	<div class="form-group">

		{{ Form::label('amount', 'Amount', array('class' => 'sr-only')) }}

		{{ Form::text('amount', Input::old('amount'), array('class' => 'form-control', 'placeholder' => 'Amount')) }}

		<span class="errors">{{ array_key_exists('amount', $errors) ? $errors['amount'] : '' }}</span>

	</div>

	<div class="form-group">

		{{ Form::label('postage', 'Postage', array('class' => 'sr-only')) }}

		{{ Form::text('postage', Input::old('postage'), array('class' => 'form-control', 'placeholder' => 'Postage')) }}

		<span class="errors">{{ array_key_exists('postage', $errors) ? $errors['postage'] : '' }}</span>

	</div>

	<div class="form-group">

		{{ Form::submit('Add New', array('class' => 'btn btn-lg btn-primary btn-block')) }}

	</div>

{{ Form::close() }}