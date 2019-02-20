@extends('layout')

    @section('title', 'Settings')
    @section('main')

	<!-- Rounded switch -->
	<form action="/settings" id="some_form" method="post">
		@csrf
		<label class="switch">
		  <input type="checkbox">
		  <span class="slider round"></span>
		</label>
		<button type="submit">Submit</button>
	</form>
	@endsection
