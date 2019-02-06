@extends('layout')

@section('title', 'Add a New Track')

@section('main')
  <div class="row">
    <div class="col">
      <form action="/tracks" method="post">
      {{csrf_field()}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" value="{{old('name')}}">
          <small class="text-danger"> {{$errors->first('name')}} </small>

          <label for="albumsMenu">Album</label>
          <select name="albumsMenu">
			  @foreach($albums as $album)
				<option value="{{$album->AlbumId}}"{{$album->AlbumId == old('albumsMenu') ? " selected" : ""}}>
				  {{$album->Title}}
				</option>
			  @endforeach
		  </select>
		  <small class="text-danger"> {{$errors->first('albumsMenu')}} </small>

		  <label for="mediaTypesMenu">Media Types</label>
          <select name="mediaTypesMenu">
			  @foreach($mediaTypes as $mediaType)
				<option value="{{$mediaType->MediaTypeId}}"{{$mediaType->MediaTypeId == old('mediaTypesMenu') ? " selected" : ""}}>
				  {{$mediaType->Name}}
				</option>
			  @endforeach
		  </select>
		  <small class="text-danger"> {{$errors->first('mediaTypesMenu')}} </small>

		  <label for="genresMenu">Genre</label>
          <select name="genresMenu">
			  @foreach($genres as $genre)
				<option value="{{$genre->GenreId}}"{{$genre->GenreId == old('genresMenu') ? " selected" : ""}}>
				  {{$genre->Name}}
				</option>
			  @endforeach
		  </select>
		  <small class="text-danger"> {{$errors->first('genresMenu')}} </small>

          <label for="composer">Composer</label>
          <input type="text" name="composer" class="form-control" value="{{old('composer')}}">
          <small class="text-danger"> {{$errors->first('composer')}} </small>

		  <label for="milliseconds">Song Length</label>
          <input type="number" name="milliseconds" class="form-control" value="{{old('milliseconds')}}">
          <small class="text-danger"> {{$errors->first('milliseconds')}} </small>

          <label for="bytes">Song Size</label>
          <input type="number" name="bytes" class="form-control" value="{{old('bytes')}}">
          <small class="text-danger"> {{$errors->first('bytes')}} </small>

          <label for="price">Price</label>
          <input type="number" name="price" class="form-control" value="{{old('price')}}">
          <small class="text-danger"> {{$errors->first('price')}} </small>

        </div>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </form>
    </div>
  </div>
@endsection
