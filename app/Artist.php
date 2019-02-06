<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //The Model class we are extending give us so many great tools!

    protected $primaryKey = 'ArtistId';
    public $timestamps = false;

    //$artist = Artist::find(5)
    //$songsByThisArtist = $artist->songs    We don't even need to use parentheses!
    public function songs()
    {
        return
    }
}
