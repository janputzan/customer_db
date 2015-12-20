{{ Form::open(array('route' => 'customer.find')) }}

	<h2 class="form-signin-heading">Search for Customer</h2>

	<div class="form-group">

		{{ Form::label('email', 'Email', array('class' => 'sr-only')) }}

		{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}

	</div>

	<div class="form-group">

		{{ Form::submit('Find', array('class' => 'btn btn-lg btn-primary btn-block')) }}

	</div>

{{ Form::close() }}