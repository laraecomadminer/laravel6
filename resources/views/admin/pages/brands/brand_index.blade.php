@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
<h3 class="page-heading mb-4">Manage brand</h3>
<p>{{Session::get('msg')}}</p>

  <div class="card-body">
	<table class="table table-hover table-striped">
		<tr>
			<th>#</th>
			<th>brand brand</th>
			<th>brand Image</th>
			<th>Action</th>
		</tr>
			@foreach($brands as $brand)
			<tr>
				<td>#</td>
				<td>{{$brand->name}}</td>
				<td>
				<img src="{{asset('images/brands/'. $brand->image)}}" width="100">
				</td>
				
				<td>
				<a href="{{route('admin.brand.edit', $brand->id)}}" class="btn btn-success">Edit</a>
				
				<a href="#deleteModal{{$brand->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>
				
					<!-- Modal -->
				<div id="deleteModal{{$brand->id}}" class="modal fade" role="dialog">
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
					<form action="{{route('admin.brand.delete', $brand->id)}}" method="post">
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