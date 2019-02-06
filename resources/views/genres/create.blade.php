@extends('layout')

@section('title', 'Edit a Genre')

@section('main')
  <div class="row">
    <div class="col">
      <form action="/genres" method="post">
      {{csrf_field()}}
        <div class="form-group">
          <label for="genre">Genre</label>
          <input type="text" name="genre" class="form-control" value="{{old('genre') == null ? $genre->Name : old('genre')}}">
          <small class="text-danger"> {{$errors->first('genre')}} </small>
          <input type="hidden" name="genreId" value="{{$genreIdFromUrl}}">
        </div>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </form>
    </div>
  </div>
@endsection
