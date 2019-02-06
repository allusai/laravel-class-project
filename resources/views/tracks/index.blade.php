@extends('layout')

@section('title','Tracks Index')

@section('main')

<div class="row">
	<div class="col-3">
	<ul>
	    {{csrf_field()}}
		<a href="/tracks/new" > Add New Track </a>
		@forelse($tracks as $track)
			<li>
				{{$track->Name}}
			</li>
			@empty
				<li>
					No Tracks Found in the Database
				</li>
		@endforelse
	</ul>
	</div>

</div>

@endsection
