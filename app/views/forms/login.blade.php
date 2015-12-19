{{ Form::open(array('route' => 'attempt')) }}

	<h2 class="form-signin-heading">Please sign in</h2>

	{{ Form::label('email', 'Email', array('class' => 'sr-only')) }}

	{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}

	{{ Form::label('password', 'Password', array('class' => 'sr-only'))}}

	{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}

	
	{{ Form::submit('Sign In', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}