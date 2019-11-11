@extends('layouts.master')
@section('content')
		
		<!-- strat sideber + content -->
			<div class="container margin-top-20">
			<div class="row">
				<div class="col-md-4">
					
					@include('partials.product_sideber')
					
				</div>
				<div class="col-md-8">
					<div class="widget">
					<h3>Search Product</h3>
					@include('pages.product.partials.all_products')
					
					<!--
						<div class="row">
							<div class="col-md-3">
								<div class="card">
								  <img class="card-img-top feature-img" src="{{ asset('images/products/samsung.jpg') }}" alt="Card image">
								  <div class="card-body">
									<h4 class="card-title">Oppo</h4>
									<p class="card-text">taka-5000</p>
									<a href="#" class="btn btn-outline-warning">Add to Cart</a>
								  </div>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="card">
								  <img class="card-img-top feature-img" src="{{ asset('images/products/samsung.jpg') }}" alt="Card image">
								  <div class="card-body">
									<h4 class="card-title">Galaxy</h4>
									<p class="card-text">taka-5000</p>
									<a href="#" class="btn btn-outline-warning">Add to Cart</a>
								  </div>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="card">
								  <img class="card-img-top feature-img" src="{{ asset('images/products/galaxy.jpg') }}" alt="Card image">
								  <div class="card-body">
									<h4 class="card-title">Nokia</h4>
									<p class="card-text">taka-5000</p>
									<a href="#" class="btn btn-outline-warning">Add to Cart</a>
								  </div>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="card">
								  <img class="card-img-top feature-img" src="{{ asset('images/products/galaxy.jpg') }}" alt="Card image">
								  <div class="card-body">
									<h4 class="card-title">Galaxy</h4>
									<p class="card-text">taka-5000</p>
									<a href="#" class="btn btn-outline-warning">Add to Cart</a>
								  </div>
								</div>
							</div>
							
						</div>  --->
					</div>
					<div class="widget">
					
					</div>
				</div>
			</div>
			</div>
		<!-- end sideber + content -->
		@endsection
		