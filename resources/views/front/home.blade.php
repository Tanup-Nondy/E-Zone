@extends('front.master')
@section('title','Home')
@section('content')
 <main role="main">

      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{URL::asset('dist/img/car2.jpg')}}" class="d-block w-100" alt="..." height="400px">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{URL::asset('dist/img/car3.jpg')}}" class="d-block w-100" alt="..." height="400px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{URL::asset('dist/img/download.jpg')}}" class="d-block w-100" alt="..." height="400px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

      <div class="album py-5 bg-light">
        

          <div class="row">
            @forelse($products as $product)
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