<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $primaryKey = 'GenreId';
    public $timestamps = false;

    //Gets the Tracks associated with this Genre, sets up the relationship
    public function tracks()
    {
        return $this->hasMany('App\Track', 'GenreId');
    }
}
