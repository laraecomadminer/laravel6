<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\District;

class DivisionController extends Controller
{
    //
	public function index()
	{
		$divisions = Division::orderBy('priority', 'asc')->get();
		return view('admin.pages.divisions.division_index',compact('divisions'));	
	}
	public function divisionCreate()
	{
		return view('admin.pages.divisions.create_division');
	}
	public function divisionStore(Request $request)
	{
		  $this->validate($request, [
			'name' =>'required',
			'priority' =>'required',
		 ]);
		 $division = new Division();
		
		$division->name = $request->name;
		$division->priority = $request->priority;
		$division->save();
		
		return redirect()->route('admin.divisions')->with('msg', 'Division Added Successfully');
		 
	}	
	public function editDivision($id)
		{
			$division = Division::find($id);
			if(!is_null($division)){
			return view('admin.pages.divisions.edit_division', compact('division'));
				}else{
					return redirect()->route('admin.divisions');
				}
		}	
	
	public function updateDivision(Request $request, $id)
	{
		  $this->validate($request, [
			'name' =>'required',
			'priority' =>'required',
		 ]);
		
		$division =Division::find($id);
		 
		$division->name = $request->name;
		$division->priority = $request->priority;
		$division->save();
		
		return redirect()->route('admin.divisions');
	}
	
	public function deleteDivision($id)
	{
		$division = Division::find($id);
		if(!is_null($division))
		{
			//delect all district for this division
		$districts = District::where('division_id', $division->id)->get();
		foreach($districts as $district){
		$district->delete();
			
		}
			
		$division->delete();
		}
		return redirect('/admin/divisions')->with('msg', 'Division Deleted Successfully');
	}
}


