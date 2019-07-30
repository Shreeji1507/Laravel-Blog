<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// welcome page route

/*App::bind('App\Billing\Stripe', function (){
	return new \App\Billing\Stripe(config('services.stripe.secret'));

});*/

/*App::singleton('App\Billing\Stripe', function (){
	return new \App\Billing\Stripe(config('services.stripe.secret'));

});*/


//$stripe = App::make('App\Billing\Stripe');
//$stripe = app('App\Billing\Stripe');
//App::instance('App\Billing\Stripe', $stripe);

//  $stripe = resolve('App\Billing\Stripe');

//dd($stripe);


use App\Task;


Route::get('/posts', 'PostsController@index')->name('home');
 

 // controller => PostsController

// Eloquent Model => Post


// Migartion => create_posts_table



Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');


Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');








//Route::get('/tasks', function () {

	//$name = 'Shreeji';
	//$tasks = DB::table('tasks')->where('created_at', '>=');
	//$tasks = DB::table('tasks')->latest()->get();

	//$tasks = Task::all();

	/*$tasks =
	 [

		'Go to the store',
     	'Finish my screencast', 
     	'Clean the house'
	 ];*/

	

	//return $tasks;
	//return view('tasks.index', compact('tasks'));
	//return view('welcome')->with('name', $name)->with('tasks', $tasks);
	/*return view('welcome', [
		'tasks' => $tasks,
		'name' => $name
	]); */
//}); 

//Route::get('/tasks/{task}', function (Task $task)

//Route::get('/tasks/{task}', function ($id) {


	//dd($id);
	//$task = DB::table('tasks')->find($id);

	//$task = App\Task::find($id);
	//$task = Task::find($id);
	//dd($task);
	//return $tasks;


	//Task::incomplete(); //->get(); 
	//return view('tasks.show', compact('task')); // 'tasks/show'
	//return view('welcome')->with('name', $name)->with('tasks', $tasks);
	/*return view('welcome', [
		'tasks' => $tasks, 
		'name' => $name
	]); */
//});

Route::get('/', function () {

	$name = 'Shreeji';

	return view('welcome')->with('name', $name);
});



//Auth::routes();


// about us page route
Route::get('/about', function () {
    return view('about');
});



//Route:get('/register', 'AuthController@register');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');



//Route::get('/login', 'AuthController@login');
Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');


Route::get('/logout', 'SessionsController@destroy');

