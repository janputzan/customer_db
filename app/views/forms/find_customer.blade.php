{{ Form::open(array('route' => 'customer.find')) }}

	<h2 class="form-signin-heading">Search for Customer</h2>

	{{ Form::label('email', 'Email', array('class' => 'sr-only')) }}

	{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}

	{{ Form::submit('Find', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}