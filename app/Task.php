<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*public static function incomplete()
    {
    	return static::where('completed', 0)->get(); 
    }*/

    public function scopeIncomplete($query)//, $val) Task:incomplete()
    {

    	return $query->where('completed', 0);
    }

    /*public static function complete()
    {
    	return static::where('completed', 1)->get(); 
    }*/
}
