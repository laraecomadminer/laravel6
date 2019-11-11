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
<div class="card-header">Edit District</div>

		<form action="{{route('admin.district.update', $district->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			  <div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control" id="name" value="{{$district->name}}">
			  </div>
			  <div class="form-group">
				<label for="division_id">Select a division for this district:</label>
				<select class="form-control" name="division_id">
					<option value="">please Select a division for this district:</option>
					@foreach($divisions as $division)
						<option value="{{$division->id}}"{{$district->division->id==$division->id ? 'selected' : '' }}>{{$division->name}}</option>
					@endforeach
				</select>
			  </div>
			  
			  
			  		
			  <button type="submit" class="btn btn-primary">Update division</button>
			</form>
</div>
</div>
@endsection