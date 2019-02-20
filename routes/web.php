
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//When a request comes in for '/', the corresponding controller function is called

Route::middleware(['WebsiteAvailable'])->group(function() {
    Route::get('/tracks.php', 'InvoicesController@genre');
    Route::get('/playlists', 'PlaylistController@index');
    Route::get('/playlists/new', 'PlaylistController@create');
    Route::get('/playlists/{id}', 'PlaylistController@index');
    Route::post('/playlists', 'PlaylistController@store');

    Route::get('/tracks', 'TracksController@index');
    Route::post('/tracks', 'TracksController@store');
    Route::get('/tracks/new', 'TracksController@create');
    Route::get('/genres', 'GenresController@index');
    Route::post('/genres', 'GenresController@store');
    Route::get('/genres/{id}/edit', 'GenresController@create');

    //Authentication Routes
    Route::get('/signup', 'SignUpController@index');
    Route::post('/signup', 'SignUpController@signup');
});

//This is a route that only works for authenticated users
Route::middleware(['authenticated'])->group(function() {
    Route::get('/profile','AdminController@index');
    Route::get('/','InvoicesController@index');
});


Route::middleware(['authenticated'])->group(function() {
        Route::get('/settings','MaintenanceController@admin');
        Route::post('/settings', 'MaintenanceController@toggleMaintenance');
});

Route::get('/maintenance', 'MaintenanceController@index');

    //These routes should be available regardless of maintenance mode

//The rest of the Authenticated Routes
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');


//Route is the first thing we make
//Then "php artisan make:controller PlaylistController" will make the controller
//Now we open that up and put "Use DB;" as well as the index function

//Then we make the view file which is something.blade.php and here we put something to be "playlist.index"
// Then we can return the view in the controller with some variables "return view('playlist.index', ['playlists' => $playlists]);"

//Route::get('/playlists/{id}', 'PlaylistController@show');
//This second playlists route uses {id} as a placeholder which gets filled in!
//Then the show function gets called to display more information about whatever {id} actually is

// This order of routes does matter because otherwise the "new" would be considered as a filler for "{id}"
// Route::get('/playlists/new', 'PlaylistController@index');
// Route::get('/playlists/{id}', 'PlaylistController@index');


//Create.blade.php (he put the code in Slack)
//Then we made a route for it
//Then made the controller function to return that view


//Routes is it right, does the controller have a function, is the view correct
