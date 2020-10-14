<?php

namespace App\Http\Controllers;

use App\AddressModel;
use App\OrdersModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$cartItems=Cart::content();
    	return view('cart.checkout',compact('cartItems'));
    }
    public function address(Request $request)
    {
    	$this->validate($request,[
    		'fullname'=>'required|min:5|max:35',
    		'pincode'=>'required|numeric',
    		'city'=>'required|min:5|max:25',
    		'state'=>'required|min:5|max:35',
    		'country'=>'required'
    	]);
    	$request['user_id']=Auth::user()->id;
    	AddressModel::create($request->all());
    	OrdersModel::createOrder();
    	Cart::destroy();
    	return view('profile.thanksyou');
    }
}
