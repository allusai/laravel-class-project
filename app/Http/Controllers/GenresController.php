<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Log;

class GenresController extends Controller
{
    public function index()
    {

        //First we want to capture the {id} variable from the url
        $genres = DB::table('genres')->get();


        return view('genres.index', ['genres' => $genres]);
    }


    public function create($genreIdFromUrl = null)
    {
        if($genreIdFromUrl) {
            $genre = DB::table('genres')->where('GenreId', '=', $genreIdFromUrl)->first();
        } else {
            $genre = "";
        }

        return view('genres.create', ['genre' => $genre, 'genreIdFromUrl' => $genreIdFromUrl]);
    }

    public function store(Request $request)
    {
        // validate name of genre using the built in Laravel validator and array of rules
        $input = $request->all();

        $validation = validator::make($input, [
            'genre' => 'required|min:3|unique:genres,Name'
        ]);

        // if this validation fails, redirect back to the original form with the right error
        if($validation->fails()) {
            info("Genre thingy isn't valid.");
            return redirect('genres/'.$request->genreId.'/edit')->withInput()->withErrors($validation);
            //This wasn't working because on the blade.php page the first('fieldName') had the wrong fieldName
        }

        info("Genre thingy works!");
        info($request->genreId);
        info($request->genre);
        info(  DB::table('genres')->where('GenreId','=',$request->genreId)->get() );

        // otherwise insert genre into db, the "name" is actually from the form
        DB::table('genres')->where('GenreId','=',$request->genreId)->update( ['Name' => $request->genre]);

        // redirect back to /genres
        return redirect('/genres');


    }
}
