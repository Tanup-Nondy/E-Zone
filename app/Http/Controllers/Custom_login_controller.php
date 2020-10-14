<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Custom_login_controller extends Controller
{
    //
    public function main_log(){
    	return view('auth.login');
    }
    public function index(Request $request)
    {
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    		$user=User::where('email',$request->email)->first();
    		if($user->is_admin()){
    			return view('admin/home');
    		}
    		return view('front/home');
    	}
    	return view('auth.login');
    }
}
