<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $primaryKey = 'PlaylistId';
    public $timestamps = false;

    //Gets the tracks in this playlist
    public function tracks()
    {
        //An important convention is to do the primary key of this class first (PlaylistId). Careful of copy pasting, make sure the order is right.
        return $this->belongsToMany('App\Track', 'playlist_track', 'PlaylistId', 'TrackId');
    }
}
