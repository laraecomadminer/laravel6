<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerificationController extends Controller
{
    
   public function verify($token)
	{
		
		$user = User::where('remember_token', $token)->first();
		if(!is_null($user)){
		$user->status = 1;
		$user->remember_token = NULL;
		$user->save();
		
		//session()->flash('success','register successfully | Now login');
		return redirect('login');
		
		}else{
			//session()->flash('errors','Sorry!! Your token is not match');
			return redirect('/');
		}
	}
}
