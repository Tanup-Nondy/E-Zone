
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0c5460">
  <div class="container">
  <a class="navbar-brand" href="#">
      <img src="{{url('images/Untitled.png')}}" alt="Logo" style="width:40px;height 40px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/shop">Shop</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php $cats=DB::table('categories')->get(); ?>
          @foreach($cats as $cat)
            <a class="dropdown-item" href="{{url('category',$cat->id)}}">{{ucwords($cat->name)}}</a>
          @endforeach  
        </div>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="/contact">Contact</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="/wishlist">
          <i class="fa fa-star"></i> Wish List
          <span style="color:green; font-weight: bold;">({{App\WishlistModel::count()}})</span></a>
      </li>
      <li class="nav-item" class="list-style-type:none">
          <a class="nav-link" href="/cart">
            &nbsp;Cart&nbsp;({{Cart::count()}} items)&nbsp;({{Cart::total()}} $)
          </a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      @guest
        <li><a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        @if (Route::has('register'))
          <li><a class="nav-link" href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
          </li>
        @endif
      @else
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} 
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/profile">
                {{ __('Profile') }}
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            </div>
      </li>
      @endguest
    </ul>
  </div>
  </div>
</nav>
