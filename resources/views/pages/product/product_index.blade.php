@extends('layouts.master')
@section('content')
		
		<!-- strat sideber + content -->
			<div class="container margin-top-20">
			<div class="row">
				<div class="col-md-4">
					<div class="list-group">
					
					@include('partials.product_sideber')
			
					</div>
				</div>
				<div class="col-md-8">
					<div class="widget">
					<h3>Products</h3>
					@include('pages.product.partials.all_products')
						
						
					</div>
					<div class="widget">
					
					</div>
				</div>
			</div>
			</div>
		<!-- end sideber + content -->
		@endsection
		