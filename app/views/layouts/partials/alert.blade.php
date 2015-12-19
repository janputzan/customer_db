@if ($alert = Session::get('alert'))

	<div class="alert alert-{{ $alert->type }}" role="alert">
		{{ $alert->message }}
	</div>

@endif