<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class PlaylistController extends Controller
{
    public function index($playlistId = null)
    {
        $playlists = DB::table('playlists')->get();

        //If the playlist Id is in the Url do this otherwise just return an empty array
        //This saves us from making a separate function
        if($playlistId) {
            //First we want to capture the {id} variable from the url
             $tracks = DB::table('tracks')
                    ->join('playlist_track', 'tracks.TrackId', '=', 'playlist_track.TrackId')
                    ->where('PlaylistId', '=', $playlistId)
                     ->get();

        } else {
            $tracks = [];
        }

        return view('playlist.index', ['playlists' => $playlists, 'tracks' => $tracks]);
    }


    public function create()
    {
        return view('playlist.create');
    }

    public function store(Request $request)
    {
        // validate name of Song using the built in Laravel validator and array of rules
        $input = $request->all();

        $validation = validator::make($input, [
            'name' => 'required|min:5|unique:playlists,Name'
        ]);

        // if this validation fails, redirect back to the original form with the right error
        if($validation->fails()) {
            return redirect('playlists/new')->withInput()->withErrors($validation);
        }

        // otherwise insert playlist into db, the "name" is actually from the form
        DB::table('playlists')->insert( ['Name' => $request->name] );

        // redirect back to /playlists
        return redirect('/tracks');


    }
}
