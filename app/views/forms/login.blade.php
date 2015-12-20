{{ Form::open(array('route' => 'attempt')) }}

	<h2 class="form-signin-heading">Please sign in</h2>

	<div class="form-group">
	
		{{ Form::label('email', 'Email', array('class' => 'sr-only')) }}

		{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}

	</div>

	<div class="form-group">

		{{ Form::label('password', 'Password', array('class' => 'sr-only'))}}

		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}

	</div>

	<div class="form-group">
	
		{{ Form::submit('Sign In', array('class' => 'btn btn-lg btn-primary btn-block')) }}

	</div>

{{ Form::close() }}