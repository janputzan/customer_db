{{ Form::open(array('route' => 'customer.store')) }}

	<h2 class="form-signin-heading">Add New Customer</h2>

	<h3>Customer Details</h3>

	{{ Form::label('email', 'Email', array('class' => 'sr-only')) }}

	{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}

	<span class="errors">{{ array_key_exists('email', $errors) ? $errors['email'] : '' }}</span>

	<h3>Order Details</h3>

	{{ Form::label('quantity', 'Quantity', array('class' => 'sr-only')) }}

	{{ Form::text('quantity', Input::old('quantity'), array('class' => 'form-control', 'placeholder' => 'Quantity')) }}

	<span class="errors">{{ array_key_exists('quantity', $errors) ? $errors['quantity'] : '' }}</span>

	{{ Form::label('amount', 'Amount', array('class' => 'sr-only')) }}

	{{ Form::text('amount', Input::old('amount'), array('class' => 'form-control', 'placeholder' => 'Amount')) }}

	<span class="errors">{{ array_key_exists('amount', $errors) ? $errors['amount'] : '' }}</span>

	{{ Form::label('postage', 'Postage', array('class' => 'sr-only')) }}

	{{ Form::text('postage', Input::old('postage'), array('class' => 'form-control', 'placeholder' => 'Postage')) }}

	<span class="errors">{{ array_key_exists('postage', $errors) ? $errors['postage'] : '' }}</span>

	{{ Form::submit('Add New', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}