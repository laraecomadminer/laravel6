@extends('admin.layouts.master')
@section('content')
<div class="card">
<div class="card-body">
<div class="card-header">Add Product</div>

		<form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
				@csrf
			  <div class="form-group">
				<label for="title">Title:</label>
				<input type="text" name="title" class="form-control">
			  </div>
			  
			  <div class="form-group">
				<label for="description">Description:</label>
				<textarea name="description" class="form-control"></textarea>
			  </div>
			  
			  <div class="form-group">
				<label for="price">Price:</label>
				<input type="number" name="price" class="form-control" id="email">
			  </div>
			  
			  <div class="form-group">
				<label for="quantity">Quantity:</label>
				<input type="number" name="quantity" class="form-control">
			  </div>
			  <!------>
			  <div class="form-group">
				<label for="category_id">select Category:</label>
				<select class="form-control" name="category_id">
				<option>select a category for product</option>
				@foreach(App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
					<option value="{{$parent->id}}">{{$parent->name}}</option>
					@foreach(App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
					<option value="{{$child->id}}"> ----->{{$child->name}}</option>
				 @endforeach
				@endforeach
				</select>
			  </div>
			  
			  <div class="form-group">
				<label for="brand_id">select Brand:</label>
				<select class="form-control" name="brand_id">
				<option>select a brand for product</option>
				@foreach(App\Brand::orderBy('name', 'asc')->get() as $brand)
					<option value="{{$brand->id}}">{{$brand->name}}</option>
					
				@endforeach
				</select>
			  </div>
			  <!------>
			  
			  
			  
			  <div class="row"> 
			  <div class="col-md-4">
				<label for="product_image">Product Image:</label>
				<input type="file" name="product_image[]" class="form-control" id="product_image">
			  </div>
			  
			  <div class="col-md-4">
				<label for="product_image">Product Image:</label>
				<input type="file" name="product_image[]" class="form-control" id="product_image">
			  </div>
			  <div class="col-md-4">
				<label for="product_image">Product Image:</label>
				<input type="file" name="product_image[]" class="form-control" id="product_image">
			  </div>
			  </div>
			  
			  <div class="form-group form-check">
				<label class="form-check-label">
				  <input class="form-check-input" type="checkbox"> Remember me
				</label>
			  </div>		
			  <button type="submit" class="btn btn-primary">Add Product</button>
			</form>
</div>
</div>
@endsection