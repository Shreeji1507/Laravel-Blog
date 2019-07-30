<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    //protected $fillable = ['title', 'body'];

    // for the fields that are not allowed massed
    //protected $guarded = ['title', 'body'];

    // nothing will be guarded
    protected $guarded = [];


}
