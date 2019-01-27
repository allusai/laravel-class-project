<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InvoicesController extends Controller
{
    //Handles the index.php request
    public function index(Request $request)
    {
        //$query = DB::table('invoices')
       // ->join('customers','invoices.CustomerId', '=', 'customers.CustomerId');
        $query = DB::table('genres');

        //If there is a valid search term in the uRL
        //if($request->query('search')) {
        //    $query->where('FirstName', '=', $request->query('search'));
       // }


       // $invoices = $query->get();
       $genres = $query->get();

        $semester = 'Spring 2019'; //The variable semester has this value
        $course = 'ITP 405';
                                                //All the values we pass to the page front-end
        return view('invoices', ['genres' => $genres, 'search' => $request->query('search'),
                                                     'uscSemester' => $semester, 'course' => $course]);
    }

    //Handles the genres.php request (clicking on one genre element)
    public function genre(Request $request)
    {
    $sql = "
    SELECT
      tracks.Name as TrackName,
      albums.Title,
      artists.Name as ArtistName,
      tracks.UnitPrice
    FROM tracks, albums, artists, genres
    WHERE tracks.AlbumId = albums.AlbumId
    AND albums.ArtistId = artists.ArtistId
    AND genres.GenreId = tracks.GenreId
  ";

        $query = DB::table('tracks')
                                    ->where("genres.Name", "=", $_GET['genre'])
                                    ->join("albums", "tracks.AlbumId", "=" , "albums.AlbumId")
                                    ->join("artists", "albums.ArtistId", "=", "artists.ArtistId")
                                    ->join("genres", "genres.GenreId", "=", "tracks.GenreId")
                                    ->select('tracks.Name as TrackName','albums.Title','artists.Name as ArtistName','tracks.UnitPrice');

        $results = $query->get();

        return view('tracks', ['results' => $results]);
    }

}
