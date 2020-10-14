<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use App\ProductModel;
use App\WishlistModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('profile.index');
    }
    public function orders()
    {
    	$user=Auth::user()->id;
    	$orders=DB::table('orders_model_product_model')
    	->leftJoin('products','products.id','=','orders_model_product_model.product_model_id')
    	->leftJoin('orders','orders.id','=','orders_model_product_model.orders_model_id')
    	->where('orders.user_id','=',$user)->get();
    	return view('profile.orders',compact('orders'));
    }
    public function address()
    {
    	$user=Auth::user()->id;
    	$address=DB::table('address')->where('user_id',$user)->limit(1)->get();
    	return view('profile.address',compact('address'));
    }
    public function updateAddress(Request $request){
        $this->validate($request,[
            'fullname'=>'required|min:5|max:35',
            'pincode'=>'required|numeric',
            'city'=>'required|min:5|max:25',
            'state'=>'required|min:5|max:25',
            'country'=>'required'
        ]);
        $user=Auth::user()->id;
        DB::table('address')->where('user_id',$user)->update($request->except('_token'));
        return back()->with('msg','Your address has been updated');
    }
    public function password()
    {
        return view('profile.updatePassword');
    }
    public function updatePassword(Request $request){
        $oldpass=$request->oldPassword;
        $newpass=$request->newPassword;
        if(!Hash::check($oldpass,Auth::user()->password)){
            return back()->with('msg','Old password does not match');
        }
        else{
            $request->user()->fill(['password'=>Hash::make($newpass)])->save();
            return back()->with('msg','Your password has been updated');
        }
    }
    public function wishlist()
    {
        $products=DB::table('wishlist')->leftJoin('products','wishlist.pro_id','=','products.id')->get();
        return view('profile.wishlist',compact('products'));
    }
    public function addWishlist(Request $request){
        $wishlist=new WishlistModel();
        $wishlist->user_id=Auth::user()->id;
        $wishlist->pro_id=$request->pro_id;
        $wishlist->save();
        $products=ProductModel::findOrFail($request->pro_id);
        //$products=DB::table('products')->where('id',$request->pro_id)->get();
        //dd($products);
        return view ('front.product_detail',compact('products'));
    }
    public function removeWishList($id){
        DB::table('wishlist')->where('pro_id','=',$id)->delete();
        return back()->with('msg',"Item removed from wishlist");
    }
}
