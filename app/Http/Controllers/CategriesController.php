<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
	public function show($id)
    {
        $category = Category::find($id);
		if(!is_null($category)){
			return view('pages.categories.show', compact('category'));
		}else{
			session()->flash('errors','Sorry!There is no category by this id');
			return redirect('/');
		}
    }

    
}
