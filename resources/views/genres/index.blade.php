<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Week 3</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>

   @extends('layout')

    @section('title', 'Genres')
    @section('main')


  <table class="table">
    <tr>
      <th>Genre</th>
    </tr>
		@forelse($genres as $genre)
      <tr>
        <td>

        <a href="tracks.php?genre={{$genre->Name}}"> {{$genre->Name}}  </a>
        <a href="genres/{{$genre->GenreId}}/edit"> (Edit) </a>

        </td>
      </tr>


    @empty
      <tr>
        <td colspan="1">No genres found</td>
      </tr>

    	@endforelse
  </table>
</body>
</html>
