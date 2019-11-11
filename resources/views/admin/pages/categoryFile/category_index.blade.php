@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
<h3 class="page-heading mb-4">Manage Category</h3>
<p>{{Session::get('msg')}}</p>

  <div class="card-body">
	<table class="table table-hover table-striped">
		<tr>
			<th>#</th>
			<th>Parent Category</th>
			<th>Category Image</th>
			<th>Parent Category</th>
			<th>Action</th>
		</tr>
			@foreach($categories as $category)
			<tr>
				<td>#</td>
				<td>{{$category->name}}</td>
				<td>
				<img src="{{asset('images/categories/'. $category->image)}}" width="100">
				</td>
				<td>
				@if($category->parent_id == NULL)
					Primary Category
				@else
					{{ $category->parent->name }}
				
				@endif
				</td>
				<td>
				<a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-success">Edit</a>
				
				<a href="#deleteModal{{$category->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>
				
					<!-- Modal -->
				<div id="deleteModal{{$category->id}}" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title"><i>Confirmation</i></h4>
							</div>
							<div class="modal-body">
								<strong>Are you sure to delete?</strong>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					<form action="{{route('admin.category.delete', $category->id)}}" method="post">
						@csrf
								<button type="submit" class="btn btn-danger">Yes</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				</td>
				
			</tr>
		@endforeach
		</table>
	</div>
</div>
</div>
@endsection