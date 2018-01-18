<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //this allows for the data to be persisted to the specific keys for each model.
    protected $fillable = ['name'];
}
