<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index(Posts $posts )
    {        
        //return session('message');


        //$posts = Post::orderBy('created_at', 'desc')->get();
        //$posts = \App\Post::all();                                        
        //$posts = Post::latest()->get();

        
        //$posts = (new \App\Repositories\Posts)->all();
        //dd($posts);
        //$posts = $posts->all();
        $posts = Post::latest()->filter(request(['month', 'year']))->get();

        /*$posts = Post::latest();
        if ($month = request('month'))
        {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = request('year'))
        {
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();*/

        //$archives = Post::archives();



    	return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
    
    	return view('posts.show', compact('post'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {

       //  dd(request(['body']));
        // dd(request()->)

         // create a new post using the request data
       // $post = new Post;

        /*$post->title = request('title');
        $post->body = request('body');
        // Save it to the database and redirect to the homepage
        $post->save();*/

        /*Post::create([

                'title' => request('title'),
                 'body' => request('body')

        ]); */


        $this->validate(request(), [

            //'title' => 'required|min:..|max:...'
            'title' => 'required',
            'body' => 'required'


        ]);

        auth()->user()->publish(new Post(request(['title', 'body'])));

        //Post::create(request(['title', 'body']));  
        
       /* Post::create([

            'title' => request('title'),
            'body' => request('body'),
            // 'user_id' => auth()->user()->id
            'user_id' => auth()->id()

        ]);*/

        session()->flash('message', 'Your post has now been published');
       

        return redirect('/posts');
        
    }
}
 