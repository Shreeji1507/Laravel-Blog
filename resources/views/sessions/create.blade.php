@extends('blog_layouts.master')


@section('blog_content')

	
	<div class="col-md-8">

		<h1>Sign In</h1>


		<form method="POST" action="/login">

			{{ csrf_field() }}

			
			<div class="form-group">
			    <label for="email">Email Address:</label>
			    <input type="email" class="form-control" id="email" name="email" required>
			</div>

			<div class="form-group">
			    <label for="password">Password:</label>
			    <input type="password" class="form-control" id="password" name="password" required>
			</div>
			
			<div class="form-group">
				
				<button type="submit" class="btn btn-primary">Sign In </button>
			</div>
			
			@include ('blog_layouts.errors')
		
		</form>
	</div>

@endsection