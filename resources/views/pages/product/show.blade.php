@extends('layouts.master')
@section('content')

@section('title')
{{$product->title}}|Laravel Ecomerce Sites
@endsection
		<!-- strat sideber + content -->
			<div class="container margin-top-20">
			<div class="row">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner">
					  @php $i=1;  @endphp
					  @foreach($product->images as $image)
						<div class="carousel-item {{$i==1 ? 'active':''}}">
						  <img class="d-block w-100" src="{{asset('images/products/'.$image->image)}}" alt="First slide">
						</div>
						@php $i++;  @endphp
						@endforeach
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
					  <!---- problem solve or skip
					  /its product views
					  <div class="mt-3">
				 <p>Category <span class="badge badge-info">{{$product->category->name}}</span></p>
				 <p>Brand <span class="badge badge-info">{{$product->category}}</span></p>
					  </div>
					  --->
					  
					</div>
				<div class="col-md-8">
					<div class="widget">
					<h3>{{$product->title}}</h3>
					<h3>{{$product->price}}taka
					<span class="badge badge-primary">
						{{$product->quantity < 1 ? 'No Item Is abailable':$product->quantity.'Item in Stoke'}}
					</span>
					</h3>
					
						<div class="product-description">
						{{$product->description}}
						</div>
						
					</div>
					<div class="widget">
					
					</div>
				</div>
			</div>
			</div>
		<!-- end sideber + content -->
		@endsection
		