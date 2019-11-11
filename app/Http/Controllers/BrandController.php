<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Image;
use File;

class BrandController extends Controller
{
    //
	public function index()
	{
		$brands = Brand::orderBy('id', 'desc')->get();
		return view('admin.pages.brands.brand_index',compact('brands'));	
	}
	public function brandCreate()
	{
		return view('admin.pages.brands.create_brand');
	}
	public function brandStore(Request $request)
	{
		  $this->validate($request, [
			'name' =>'required',
			'image' =>'nullable|image',
		 ]);
		 $brand = new Brand();
		
		$brand->name = $request->name;
		$brand->description = $request->description;
		//image
		if($request->image){
			$image=$request->file('image');
			$img = time().'.'. $image->getClientOriginalExtension();
			$location = public_path('images/brands/'. $img);
			Image::make($image)->save($location);
			$brand->image =$img;
			
			}
		$brand->save();
		
		return redirect()->route('admin.brands')->with('msg', 'brand Added Successfully');
		 
	}	
	public function editBrand($id)
		{
			$brand = Brand::find($id);
			if(!is_null($brand)){
			return view('admin.pages.brands.edit_brand', compact('brand'));
				}else{
					return redirect()->route('admin.brands');
				}
		}	
	
	public function updateBrand(Request $request, $id)
	{
		  $this->validate($request, [
			'name' =>'required',
			'image' =>'nullable|image',
		 ]);
		
		$brand =Brand::find($id);
		 
		$brand->name = $request->name;
		$brand->description = $request->description;
		//image
		if($request->image>0){
			//delete the old image
			if(File::exists('images/brands/'.$brand->image)){
				File::delete('images/brands/'.$brand->image);
			}
			
			$image=$request->file('image');
			$img = time().'.'. $image->getClientOriginalExtension();
			$location = public_path('images/brands/'. $img);
			Image::make($image)->save($location);
			$brand->image =$img;
			
			}
		  $brand->save();
		
		return redirect()->route('admin.brands');
	}
	
	public function deleteBrand($id)
	{
		$brand = Brand::find($id);
		if(!is_null($brand))
		{
			//delete category image
			if(File::exists('images/brands/'.$brand->image)){
				File::delete('images/brands/'.$brand->image);
			}
			
		}
		$brand->delete();
		return redirect('/admin/brands')->with('msg', 'Brand Deleted Successfully');
	}
}


