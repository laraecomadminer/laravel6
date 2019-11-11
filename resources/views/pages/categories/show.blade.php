@extends('layouts.master')
@section('content')
		
		<!-- strat sideber + content -->
			<div class="container margin-top-20">
			<div class="row">
				<div class="col-md-4">
					<div class="list-group">
					@include('partials.product_sideber')
					<!---
					  <a href="#" class="list-group-item list-group-item-action">First item</a>
					  <a href="#" class="list-group-item list-group-item-action">Second item</a>
					  <a href="#" class="list-group-item list-group-item-action">Third item</a>	--->
					</div>
				</div>
				<div class="col-md-8">
					<div class="widget">
					<h3>All Products in <span class="badge badge-info">{{$category->name}} category</span></h3>
					@php
						$products = $category->products()->paginate(2);
					@endphp
					@if($products->count() >0)
						@include('pages.product.partials.all_products')
						@else
							<div class="alert alert-warning">
							No product has added in this category
							</div>
						
					@endif
					
						
						
					</div>
					<div class="widget">
					
					</div>
				</div>
			</div>
			</div>
		<!-- end sideber + content -->
		@endsection
		