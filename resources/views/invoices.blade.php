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
  <form action="/" method="get" value="{{$search}}">
    <input type="text" name="search">
    <button type="submit">Search</button>
  </form>
  <a href="/" class="btn btn-link"> Clear </a>

  <table class="table">
    <tr>
      <th>Genre</th>
    </tr>
		@forelse($genres as $genre)
      <tr>
        <td>

       <?php
          		//This is the redirect link for the a tag
          		$url = "tracks.php?genre=";
          		$final_url = $url . urlencode($genre->Name);
          		$tag_stuff = "<a href=\"" . $final_url . "\"> " . $genre->Name . " </a> ";
          		echo $tag_stuff;
          ?>

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

