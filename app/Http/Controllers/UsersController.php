<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use App\Division;
use App\District;

class UsersController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
	{
		$user = Auth::user();
		return view('pages.users.dashboard', compact('user'));
	}
	public function profile()
	{
		$districts = District::orderBy('name', 'asc')->get();
		$divisions = Division::orderBy('priority', 'asc')->get();
		$user = Auth::user();
		return view('pages.users.profile', compact('user', 'divisions', 'districts'));
	}
	  public function profileUpdate(Request $request)
	{
		$user = Auth::user();
		
		$this->validate($request, [
		'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['nullable', 'string', 'max:15 '],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'phone_no' => ['required', 'max:12', 'unique:users,phone_no,'. $user->id ],
            'street_address' => ['required', 'max:100'],
            'username' => ['required', 'alpha_dash', 'max:100', 'unique:users,username,'. $user->id ],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,'. $user->id ],
           // 'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
		
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->username = $request->username;
		$user->division_id = $request->division_id;
		$user->district_id = $request->district_id;
		$user->phone_no = $request->phone_no;
		$user->street_address = $request->street_address;
		$user->shiping_address = $request->shiping_address;
		
		if($request->password != NULL || $request->password != ""){
			$user->password = Hash::make($request->password);
		}
		
		$user->ip_address = request()->ip();
		$user->save();
		
		return redirect('/userS/profile')->with('msg', 'profile updated Successfully');
	}
	
	
}
