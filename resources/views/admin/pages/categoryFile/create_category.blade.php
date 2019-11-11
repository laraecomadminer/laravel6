@extends('admin.layouts.master')
@section('content')

<h3>{{Session::get('msg')}}</h3>
    <div class="card">
	@if($errors->any())
		<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
			<ul>
				@foreach($errors->all() as $error)
					<p>{{$error}}</p>
				@endforeach
			</ul>
		</div>
		
	@endif
<div class="card">
<div class="card-body">
<div class="card-header">Add Category</div>

		<form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
				@csrf
			  <div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control" id="name">
			  </div>
			  
			  <div class="form-group">
				<label for="description">Description:</label>
				<textarea name="description" class="form-control"></textarea>
			  </div>
			 <div class="form-group">
				<label for="parent_id">Parent Category (optional):</label>
				<select class="form-control" name="parent_id">
				<option value="">please select parent category</option>
					@foreach($main_categories as $category)
					 <option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			  </div>
			 
			  
			  <div class="row"> 
			  <div class="col-md-4">
				<label for="product_image">Category Image(optional):</label>
				<input type="file" name="image" class="form-control" id="product_image">
			  </div>
			  </div>
			  
			  <div class="form-group form-check">
				<label class="form-check-label">
				  <input class="form-check-input" type="checkbox"> Remember me
				</label>
			  </div>		
			  <button type="submit" class="btn btn-primary">Add Category</button>
			</form>
</div>
</div>
@endsection