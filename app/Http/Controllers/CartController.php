<?php

namespace App\Http\Controllers;

use App\ProductModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
    	$cartItems=Cart::content();
    	//dd($cartItems);
    	return view('cart.index',compact('cartItems'));
    }
    public function addItem($id)
    {
    	$product=ProductModel::findOrFail($id);
    	Cart::add($id,$product->pro_name,1,$product->pro_price,0,['img'=>$product->image,'stock'=>$product->stock]);//here 1 is quantity and 0 is weight of product
    	return back();
    }
    public function update(Request $request,$id)
    {
    	$qty=$request->qty;
    	$proId=$request->proId;
    	$product=ProductModel::findOrFail($proId);
    	$stock=$product->stock;
    	if($qty<$stock){
    		Cart::update($id,$request->qty);
    		return back()->with('status','Cart is updated');
    	}
    	else{
    		return back()->with('status','Product quantity is out of stock');
    	}
    }
    public function remove($id)
    {
    	Cart::remove($id);
    	return back();
    }
}
