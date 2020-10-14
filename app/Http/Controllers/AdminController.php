<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
    	
    	$id=auth()->id();
    	$user=User::find($id);
    	$ad_id=$user->admin;
    	if($ad_id==1){
            return view('admin.home');
        }
        else{
            return view('front.home');
        }
    }
}
