<?php

namespace App\Http\Controllers;

use App\ProductModel;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id=auth()->id();
        $user=User::find($id);
        $ad_id=$user->admin;
        $products=ProductModel::all();
        if($ad_id==1){
            return view('admin.home');
        }
        else{
            return view('front.home',compact('products'));
        }
    }
}
