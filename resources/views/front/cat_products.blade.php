@extends('front.master')
@section('title','Product Category')
@section('content')
 <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">EZone Online Shopping</h1>
          <p class="lead text-muted">
            <a class="btn btn-primary" href="#" role="button">Ezone.com</a>
            <a class="btn btn-secondary" href="#" role="button">Ezone.com</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <?php $c=DB::table('categories')->select('name')->where('id',$id_)->get();?>
          <h4>
              Category :
              @foreach($c as $cat)
                {{$cat->name}}
              @endforeach
          </h4>
          <div class="row">
            @forelse($cat_products as $product)
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img class="card-img-top" src="{{url('images',$product->image)}}" alt="Card image cap"  height="200px">
                  <div class="card-body">
                    <del>$ {{$product->pro_price}}</del>
                    <span class="price text-muted float-right">$ {{$product->spl_price}}</span>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="{{url('/product_detail',$product->id)}}" class="btn btn-sm btn-outline-secondary">View Product</a>
                        <a href="{{url('/cart/addItem',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <h3>No product available</h3>
            @endforelse
          </div>
        </div>


    </main>
@endsection