@extends('blog_layouts.master')
	
@section('blog_content')

	<div class="col-sm-8 blog-main">
			<h1>Publish a post</h1>

			<hr/>
			<form method="post" action="/posts">

				{{ csrf_field() }}
				
			  <div class="form-group">
			    <label for="title">Title:</label>
			    <input type="text" class="form-control" id="title" name="title">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Body</label>
			    <textarea id="body" name="body" class="form-control"></textarea>
			  </div>
			  
			 <div class="form-group">
		 	 	<button type="submit" class="btn btn-primary">Publish</button>
		 	 </div>

		 	 @include('blog_layouts.errors')
			</form>

			
	</div>
@endsection