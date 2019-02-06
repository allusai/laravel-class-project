<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $primaryKey = 'TrackId';
    public $timestamps = false;

    public function playlists()
    {
        //The playlist_track is the join table. The primary key of this table goes first (TrackId), but the other one is different.
        // Maybe it's good to just use the $primaryKey variable here
        return $this->belongsToMany('App\Playlist', 'playlist_track', 'TrackId', 'PlaylistId');
    }

    //Gets the genre associated with the track, sets up the relationship
    public function genre()
    {
        return $this->belongsTo('App\Genre', 'GenreId');
    }
}
