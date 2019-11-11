<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Image;

class ProductController extends Controller
{
    //
	public function productCreate()
	{
		return view('admin.pages.product.create_product');
	}
	public function productStore(Request $request)
	{
		$request->validate([
			'title'=>'required|max:150',
			'description'=>'required',
			'price'=>'required|numeric',
			'quantity'=>'required|numeric',
			'category_id'=>'required|numeric',
			'brand_id'=>'required|numeric',
			
		]);
		
		$product = new Product;
		
		$product->title = $request->title;
		$product->description = $request->description;
		$product->price = $request->price;
		$product->quantity = $request->quantity;
		
		$product->slug = 1;
		$product->category_id = $request->category_id;
		$product->brand_id = $request->brand_id;
		$product->admin_id = 1;
		$product->save();
		
	/*	if($request->hasFile('product_image')){
			$image = $request->file('product_image');
			$img = time().'.'. $image->getClientOriginalExtension();
			$location = public_path('images/products/'. $img);
			Image::make($image)->save($location);
			
			$product_image = new ProductImage;
			$product_image->product_id = $product->id;
			$product_image->image = $img;
			$product_image->save();
		} */
		
		
		
		if(count($request->product_image)>0){
			foreach($request->product_image as $image){
				
			$img = time().'.'. $image->getClientOriginalExtension();
			$location = public_path('images/products/'. $img);
			Image::make($image)->save($location);
			
			$product_image = new ProductImage;
			$product_image->product_id = $product->id;
			$product_image->image = $img;
			$product_image->save();
		}
			}
		
		return redirect()->route('admin.product.create');
	}
	
	public function manageProduct()
	{
		$products = Product::orderBy('id', 'desc')->get();
		return view('admin.pages.product.manage_index')->with('products', $products);
		
		
	}
	public function productEdit($id)
	{
		$product = Product::find($id);
		return view('admin.pages.product.edit_product')->with('product', $product);
		
	}
	public function productUpdate(Request $request, $id)
	{
		
		$request->validate([
			'title'=>'required|max:150',
			'description'=>'required',
			'price'=>'required|numeric',
			'quantity'=>'required|numeric',
			'category_id'=>'required|numeric',
			'brand_id'=>'required|numeric',
			
		]);
		
		
		$product =Product::find($id);
		
		$product->title = $request->title;
		$product->description = $request->description;
		$product->quantity = $request->quantity;
		$product->price = $request->price;
		$product->category_id = $request->category_id;
		$product->brand_id = $request->brand_id;
		$product->save();
		
	/*	if($request->hasFile('product_image')){
			$image = $request->file('product_image');
			$img = time().'.'. $image->getClientOriginalExtension();
			$location = public_path('images/products/'. $img);
			Image::make($image)->save($location);
			
			$product_image = new ProductImage;
			$product_image->product_id = $product->id;
			$product_image->image = $img;
			$product_image->save();
		}
*/		
		return redirect()->route('admin.products');
		}
		public function productDelete($id)
	{
		$product = Product::find($id);
		if(!is_null($product))
		{
			$product->delete();
		}
		return redirect('/admin/products')->with('msg', 'Product Deleted Successfully');
	}
	
	public function show($slug){
		$product = Product::where('slug', $slug)->first();
		if(!is_null($product)){
			return view('pages.product.show', compact('product'));
		}else{
			return redirect()->route('products');
		}
	}
	
	public function search(Request $request)
   {
	   $search = $request->search;
	   $products = Product::orWhere('title', 'like','%'. $search.'%')
	   ->orWhere('description', 'like','%'. $search.'%')
	   ->orWhere('price', 'like','%'. $search.'%')
	   ->orWhere('quantity', 'like','%'. $search.'%')
	   ->orderBy('id', 'desc')->paginate(2);
	   
	   return view('admin.pages.product.search',compact('search', 'products'));
   }
	
	
}
