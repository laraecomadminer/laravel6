<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
   public function index()
   {
	   $products = Product::orderBy('id', 'desc')->paginate(2);
	   return view('pages.index',compact('products'));
   }
   public function contact()
   {
	   return view('pages.contact');
   }
   public function products()
   {
	   $products = Product::orderBy('id', 'desc')->paginate(2);
	   return view('pages.product.product_index')->with('products', $products);
   }
   
   public function search(Request $request)
   {
	   $search = $request->search;
	   $products = Product::orWhere('title', 'like','%'. $search.'%')
	   ->orWhere('description', 'like','%'. $search.'%')
	   ->orWhere('price', 'like','%'. $search.'%')
	   ->orWhere('quantity', 'like','%'. $search.'%')
	   ->orderBy('id', 'desc')->paginate(2);
	   
	   return view('pages.search',compact('search', 'products'));
   }
   
   
}
