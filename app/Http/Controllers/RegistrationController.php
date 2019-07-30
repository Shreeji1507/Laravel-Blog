<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//use App\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationForm;



class RegistrationController extends Controller
{
   public function create()
   {

   		return view('registration.create');

   }


   public function store(RegistrationForm $form)
   {

   		// validate the form, moved to the RegistrationRequest

   		// $this->validate(request(), [

   		// 	'name' => 'required',
   		// 	'email' => 'required|email',
   		// 	'password' => 'required|confirmed'

   		// ]);

   		// create and save the user, moved to the RegistrationRequest

   		/*$user = User::create(request(['name', 'email', 'password']));

         // $user = User::create([

         //    'name' => request('name'),
         //    'email' => request('email'),
         //    'password' => bcrypt(request('password'))

         // ]);
   		//User:register();

   		// sign them in

   		//\Auth::login();
   		auth()->login($user);
   		//\Request::input
   		//request()->input


         \Mail::to($user)->send(new Welcome($user)); */
   		// redirect to the home page
         
         $form->persist();

         //session('message', 'Here is the default message');
         session()->flash('message', 'Thanks so much for signing up!');
   		return redirect()->home();

   		//return redirect('/posts');
   }
}
