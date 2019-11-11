<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Image;
use File;

class CategoryController extends Controller
{
    //
	public function index()
	{
		$categories = Category::orderBy('id', 'desc')->with('parent')->get();
		return view('admin.pages.categoryFile.category_index',compact('categories'));	
	}
	public function categoryCreate()
	{
		$main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
		return view('admin.pages.categoryFile.create_category', compact('main_categories'));
	}
	public function categoryStore(Request $request)
	{
		  $this->validate($request, [
			'name' =>'required',
			'image' =>'nullable|image',
		 ]);
		 $category = new Category();
		
		$category->name = $request->name;
		$category->description = $request->description;
		$category->parent_id = $request->parent_id;
		//image
		if($request->image){
			$image=$request->file('image');
			$img = time().'.'. $image->getClientOriginalExtension();
			$location = public_path('images/categories/'. $img);
			Image::make($image)->save($location);
			$category->image =$img;
			
			}
		$category->save();
		
		return redirect()->route('admin.categories')->with('msg', 'Category Added Successfully');
		 
	}	
	public function editCategory($id)
		{
			$main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
			$category = Category::find($id);
			if(!is_null($category)){
			return view('admin.pages.categoryFile.edit_category', compact('category', 'main_categories'));
				}else{
					return redirect()->route('admin.categories');
				}
		}	
	
	public function updateCategory(Request $request, $id)
	{
		  $this->validate($request, [
			'name' =>'required',
			'image' =>'nullable|image',
		 ]);
		
		$category =Category::find($id);
		
		$category->name = $request->name;
		$category->description = $request->description;
		$category->parent_id = $request->parent_id;
		//image
		if($request->image>0){
			//delete the old image
			if(File::exists('images/categories/'.$category->image)){
				File::delete('images/categories/'.$category->image);
			}
			
			$image=$request->file('image');
			$img = time().'.'. $image->getClientOriginalExtension();
			$location = public_path('images/categories/'. $img);
			Image::make($image)->save($location);
			$category->image =$img;
			
			}
		  $category->save();
		
		return redirect()->route('admin.categories');
	}
	
	public function deleteCategory($id)
	{
		$category = Category::find($id);
		if(!is_null($category))
		{
			//if it parent category, then delete all sub category
			if($category->parent_id==NULL)
			{
			//delete sub category
			$sub_categories = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();
			
			foreach($sub_categories as $sub){
				if(File::exists('images/categories/'.$sub->image)){
				File::delete('images/categories/'.$sub->image);
				}
				$sub->delete();
			}
			
			//delete category image
			if(File::exists('images/categories/'.$category->image)){
				File::delete('images/categories/'.$category->image);
			}
			
		}
		$category->delete();
		return redirect('/admin/categories')->with('msg', 'Category Deleted Successfully');
	}
}


}