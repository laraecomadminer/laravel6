@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
<h3 class="page-heading mb-4">Manage Product</h3>
<p>{{Session::get('msg')}}</p>

  <div class="card-body">
	<table class="table table-hover table-striped">
		<tr>
			<th>#</th>
			<th>Product title</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Action</th>
		</tr>
			@foreach($products as $product)
			<tr>
				<td>#</td>
				<td>{{$product->title}}</td>
				<td>{{$product->price}}</td>
				<td>{{$product->quantity}}</td>
				<td>
				<a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-success">Edit</a>
				<a href="#deleteModal{{$product->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>
				
					<!-- Modal -->
				<div id="deleteModal{{$product->id}}" class="modal fade" role="dialog">
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
					<form action="{{route('admin.product.delete', $product->id)}}" method="post">
						{{ csrf_field() }}
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