<?php

namespace App;

use Carbon\Carbon;

//use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	/*
	Everything coming from the parent class Model
	*/

	
    //protected $fillable = ['title', 'body'];

    // for the fields that are not allowed massed
    //protected $guarded = ['title', 'body'];

    // nothing will be guarded
    //protected $guarded = [];



    public function comments()
    {
    	return $this->hasMany(Comment::class);
        //return $this->hasMany('\App\Comment');    
    } 

    public function user() // $post->user
    {
        return $this->belongsTo(User::class);
        //return $this->hasMany('\App\Comment');    
    }     

    public function addComment($body)
    {

    	$this->comments()->create(compact('body'));
    	/*Comment::create([

    		'body' => $body,
    		'post_id' => $this->id

    	]);*/
    }


    public function scopeFilter($query, $filters)
    {
        
        // copied from https://laracasts.com/discuss/channels/laravel/errorexception-e-notice-undefined-index-month
        if (isset($filters['month'])) {

            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }
        
        if (isset($filters['year'])) {

            $query->whereYear('created_at', $filters['year']);
        }
    
        /*if($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }*/
    }



    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(created_at) desc')
                    ->get()
                    ->toArray();
    }

    public function tags()
    {
        // any post may have many tags 

        // any tag may be applied to many posts

        return $this->belongsToMany(Tag::class);
    }
}
