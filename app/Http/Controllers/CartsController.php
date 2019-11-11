<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Cart;
use App\Model\Order;
use Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Cartindex()
    {
        return view('pages.cart_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function CartStore(Request $request)
    { 
	  $this->validate($request,[
	         'product_id'=>'required'
	  ],
	  [
	  'product_id.required'=>'please give a product'
	  ]);
	  
	if(Auth::check()){
	  $cart= Cart::where('user_id', Auth::id())
	  ->where('product_id', $request->product_id)
	  ->first();
	}else{
		$cart= Cart::where('ip_address', request()->ip())
	  ->where('product_id', $request->product_id)
	  ->first();
	}
	  
	  if(!is_null($cart)){
		  $cart->increment('product_quantity');
	  }else{
		  
		  $cart = new Cart();
        if(Auth::check()){
			$cart->user_id=Auth::id();
		}
		$cart->ip_address = request()->ip();
		$cart->product_id = $request->product_id;
		$cart->save();
	  }
		
		session()->flash('success', 'product has added to cart');
		return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function CartUpdate(Request $request, $id)
    {
        $cart = Cart::find($id);
		if(!is_null($cart)){
			$cart->product_quantity = $request->product_quantity;
			$cart->save();
		}else{
			return redirect()->route('carts');
		}
		return redirect('/carts')->with('msg', 'Carts Iteam Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function CartDestroy($id)
    {
        $cart = Cart::find($id);
		if(!is_null($cart)){
			$cart->delete();
		}else{
			return redirect()->route('carts');
		}
		return redirect('/carts')->with('del', 'Carts Iteam deleted Successfully');
    }
}
