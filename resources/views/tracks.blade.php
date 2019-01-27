<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Week 2</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>

   @extends('layout')

  
  <table class="table">
    <tr>
      <th>Track Name</th>
      <th>Album Title</th>
      <th>Artist Name</th>
      <th>Cost</th>
    </tr>
     @forelse($results as $result)
      <tr>
        <td>
          {{$result->TrackName}}
        </td>
        <td>
          {{$result->Title}}
        </td>
        <td>
          {{$result->ArtistName}}
        </td>
        <td>
          {{$result->UnitPrice}}
        </td>
      </tr>
    		@empty
      <tr>
        <td colspan="4">No tracks found</td>
      </tr>

        @endforelse
    
    
  </table>
</body>
</html>