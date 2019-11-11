@extends('layouts.master')
@section('content')
<p><center>{{Session::get('msg')}}</center></p>
<p><center>{{Session::get('del')}}</center></p>
<div class="container margin-top-20">
<h2>My Carts Iteam</h2>
<table class="table table-hover table-striped">
<thead>
<tr>
<th>No.</th>
<th>Product Title</th>
<th>Product Image</th>
<th>Product Quantity</th>
<th>Unit Price</th>
<th>Sub Total Price</th>
<th>Delete</th>
</tr>
</thead>

<tbody>
@php
	$total_price = 0;
@endphp
@foreach(App\Model\Cart::totalCarts() as $cart)
<tr>
<td>{{$loop->index + 1}}</td>
<td><a href="{{route('products.show', $cart->product->slug)}}">{{$cart->product->title}}</a></td>
<td>
@if($cart->product->images)
	<img src="{{asset('images/products/'. $cart->product->images->first()->image)}}" width="50">
@endif
</td>

<td>
<form class="form-inline" action="{{route('carts.update', $cart->id)}}" method="post">
@csrf
<input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}"/>
<button type="submit" class="btn btn-success ml-2">update</button>
</form>
</td>
<td>{{$cart->product->price}}tk</td>
@php
	$total_price +=$cart->product->price * $cart->product_quantity;
@endphp
<td>{{$cart->product->price * $cart->product_quantity}}</td>
<td>
<form class="form-inline" action="{{route('carts.delete', $cart->id)}}" method="post">
@csrf
<input type="hidden" name="cart_id"/>
<button type="submit" class="btn btn-danger">delete</button>
</form>
</td>
</tr>
@endforeach
<tr>
	<td colspan="4"></td>
	<td>Total Amount</td>
	<td colspan="2"><strong>{{ $total_price }}taka</strong></td>
</tr>
</tbody>
</table>
<div class="float-right">
	<a href="{{route('products')}}" class="btn btn-info btn-lg">Continue Shopping...</a>
	<a href="{{route('checkouts')}}" class="btn btn-warning btn-lg">CheckOut</a>
</div>

<br><br><br><br>
</div>
@endsection



