@extends('front.master')
@section('title','Product Detail')
@section('content')
	<div class="container">
		<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="thumbnail">
						<img src="{{url('images',$products->image)}}" alt="" class="card-image">
					</div>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<h2>
						<?php echo ucwords($products->pro_name); ?>
					</h2>
					<h5>
						{{$products->pro_info}}
					</h5>
					<h2 class="text-danger">$ {{$products->pro_price}}</h2>
					<p><b>Available: {{$products->stock}} in stock.</b></p>
					<a href="{{url('/cart/addItem',$products->id)}}" class="btn btn-sm btn-outline-secondary">Add To Cart <i class="fa fa-shopping-cart"></i></a>
					<br><br>
					<?php
						$wishlistData=DB::table('wishlist')->rightJoin('products','wishlist.pro_id','=','products.id')->where('wishlist.pro_id','=',$products->id)->get();
						$count=App\WishlistModel::where(['pro_id'=>$products->id])->count();
						if($count=="0"){
					?>
					<form action="/addWishlist" method="post" accept-charset="utf-8" role="form">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" value="{{$products->id}}" name="pro_id">
						<button type="submit" class="btn btn-default">Add To Wishlist</button>
					</form>
				<?php }else{?>
					<h3 style="color:green">Already added to to wishlist
					</h3>
					<button type="submit" class="btn btn-default"><a href="/wishlist">Wishlist</a></button>
				<?php }?>
				</div>
			
		</div>
		
	</div>
@endsection