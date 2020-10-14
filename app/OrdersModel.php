<?php

namespace App;

use App\ProductModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrdersModel extends Model
{
	protected $table='orders';
    protected $primaryKey='id';
    protected $fillable=['status', 'total', 'user_id'];
    public function orderFields(){
    	// order can have many order from product table
    	return $this->belongsToMany(ProductModel::class)->withPivot('qty','total');
    }
    public static function createOrder(){
    	$user=Auth::user();
    	$order=$user->orders()->create(['total'=>Cart::total(),'status'=>'pending']);
    	$cartItems=Cart::content();
    	foreach ($cartItems as $item){
    		$order->orderFields()->attach($item->id,
    			['qty'=>$item->qty,'tax'=>Cart::tax(),'total'=>$item->qty*$item->price]);
    	}
    }
}
