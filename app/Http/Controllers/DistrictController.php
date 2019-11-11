<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Division;

class DistrictController extends Controller
{
    public function index()
	{
		$districts = District::orderBy('name', 'asc')->get();
		return view('admin.pages.districts.district_index',compact('districts'));	
	}
	public function districtCreate()
	{
		$divisions = Division::orderBy('priority', 'asc')->get();
		return view('admin.pages.districts.create_district', compact('divisions'));
	}
	public function districtStore(Request $request)
	{
		  $this->validate($request, [
			'name' =>'required',
			'division_id' =>'required',
		 ]);
		 $district = new District();
		
		$district->name = $request->name;
		$district->division_id = $request->division_id;
		$district->save();
		
		return redirect()->route('admin.districts')->with('msg', 'district Added Successfully');
		 
	}	
	public function editDistrict($id)
		{
			$divisions = Division::orderBy('priority', 'asc')->get();
			$district = District::find($id);
			if(!is_null($district)){
			return view('admin.pages.districts.edit_district', compact('district', 'divisions'));
				}else{
					return redirect()->route('admin.districts');
				}
		}	
	
	public function updateDistrict(Request $request, $id)
	{
		  $this->validate($request, [
			'name' =>'required',
			'division_id' =>'required',
		 ]);
		
		$district =District::find($id);
		 
		$district->name = $request->name;
		$district->division_id = $request->division_id;
		$district->save();
		
		return redirect()->route('admin.districts');
	}
	
	public function deleteDistrict($id)
	{
		$district = District::find($id);
		if(!is_null($district))
		{
		$district->delete();
		}
		return redirect('/admin/districts')->with('msg', 'district Deleted Successfully');
	}
}
