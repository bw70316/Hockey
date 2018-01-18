<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{


    protected $uploads = '/images/';

    //This allows the file to be persisted to the DB

    protected $fillable = ['file'];
    //

    //this allows photos to accessed by the model and stored (see admin.users)
    public function getFileAttribute($photo) {

        return $this->uploads . $photo;

    }
}
