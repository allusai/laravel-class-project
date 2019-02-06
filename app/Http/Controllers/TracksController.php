<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Log;

// *********
// *********

//So the validation wasn't working because the select tag needs to have a name field
//And when I was passing the arguments into the insert statement, I used brackets when
//I shouldn't have (around each argument). This meant the SQL rendered was only inserting
//one field. This isn't correct, and it was easy to see from the debugger that Laravel provides.

class TracksController extends Controller
{
    public function index()
    {

        //First we want to capture the {id} variable from the url
        $tracks = DB::table('tracks')->get();


        return view('tracks.index', ['tracks' => $tracks]);
    }


    public function create()
    {
        $albums = DB::table('albums')->get();
        $mediaTypes = DB::table('media_types')->get();
        $genres = DB::table('genres')->get();

        return view('tracks.create', ['albums' => $albums, 'mediaTypes' => $mediaTypes, 'genres' => $genres]);
    }

    public function store(Request $request)
    {
        // validate name of Playlist using the built in Laravel validator and array of rules
        $input = $request->all();

        $validation = validator::make($input, [
            'name' => 'required|min:5',
            'albumsMenu' => 'required|numeric',
            'mediaTypesMenu' => 'required|numeric',
            'genresMenu' => 'required|numeric',
            'composer' => 'required',
            'milliseconds' => 'required|numeric',
            'bytes' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        // if this validation fails, redirect back to the original form with the right error
        if($validation->fails()) {
            info("This is some useful information meaning that Tracks ain't working.");
            info($validation->errors());
            return redirect('tracks/new')->withInput()->withErrors($validation);
        }
        info("Tracks is working!");

        // otherwise insert playlist into db, the "name" is actually from the form
        DB::table('tracks')->insert( [ 'Name' => $request->name, 'AlbumId' => $request->albumsMenu,
                                        'MediaTypeId' => $request->mediaTypesMenu,
                                        'GenreId' => $request->genresMenu, 'Composer' => $request->composer,
                                        'Milliseconds' => $request->milliseconds, 'Bytes' => $request->bytes,
                                        'UnitPrice' => $request->price ] );

        // redirect back to tracks home page
        return redirect('/tracks');


    }
}
