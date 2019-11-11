<form class="form-inline" action="{{route('carts.store')}}" method="post">
@csrf
<button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i>Add to Cart</button>
<input type="hidden" name="product_id" value="{{$product->id}}">

</form>