@extends('layouts.master')
@section('content')

<div class='container margin-top-20'>
<div class="card card-body">
<center>
<h1>Confirm Items</h1>
<hr>

<div class="row">
<div class="col-md-7 border-right">
@foreach(App\Model\Cart::totalCarts() as $cart)
	<p>{{$cart->product->title}} - <strong>{{$cart->product->price}} taka</strong>
	-{{$cart->product_quantity}} items
	</p>
@endforeach
</div>

<div class="col-md-5">
	@php
		  $total_price = 0; 
	@endphp
@foreach(App\Model\Cart::totalCarts() as $cart)
	@php
	  $total_price += $cart->product->price * $cart->product_quantity;
	@endphp
@endforeach
<p>total price:<strong>{{$total_price}}</strong>taka</p>
<p>total price with shipping cost:<strong>{{$total_price + App\Model\setting::first()->shipping_cost}}</strong>taka</p>

</div>
</div>
<p>
	<a href="{{route('carts')}}">Change cart Items</a>
</p>

</center>
</div>

<div class="card card-body mt-2">
<h1>Shipping Address</h1>
<hr>
<!-------------------->
<form method="POST" action="{{ route('userS.profile.update') }}">
@csrf
<!----->
<div class="form-group row">
	<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>

	<div class="col-md-6">
		<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::check() ? Auth::user()->first_name. ''.Auth::user()->last_name : ''}}" required autocomplete="name" autofocus>

		@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>


<div class="form-group row">
	<label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

	<div class="col-md-6">
		<input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{Auth::check() ? Auth::user()->phone_no : ''}}" required autocomplete="phone_no">

		@error('phone_no')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>
<!------->

<!------->

<div class="form-group row">
	<label for="shiping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shiping address (optional)') }}</label>

	<div class="col-md-6">
		<textarea id="shiping_address" class="form-control @error('shiping_address') is-invalid @enderror" name="shiping_address" rows="4" autocomplete="shiping_address">{{Auth::check() ? Auth::user()->shiping_address : ''}}</textarea>

		@error('shiping_address')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>

<!------>

<div class="form-group row">
	<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

	<div class="col-md-6">
		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::check() ? Auth::user()->email : ''}}" required autocomplete="email">

		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>

<div class="form-group row">
	<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

	<div class="col-md-6">
		<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

		@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>



<div class="form-group row mb-0">
	<div class="col-md-6 offset-md-4">
		<button type="submit" class="btn btn-primary">
			{{ __('order now') }}
		</button>
	</div>
</div>
</form>
						<!------------->
</div>


</div>
@endsection