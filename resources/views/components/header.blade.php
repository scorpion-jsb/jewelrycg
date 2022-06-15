<header class="bg-light">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <span class="d-flex align-items-center col-md-1 mb-2 mb-md-0">
            <a href="{{ route('index') }}">
                <img src="{{ asset('img/logo.png') }}" width="50" height="50" alt="logo">
            </a>
        </span>
    
        <div class="col-12 col-md-7 mb-2 mb-md-0 row">
            <form method="get" action="" class="col-10 col-md-5 mb-2 justify-content-center mb-md-0 input-group">
    
                <div class="input-group-prepend">
                    <select name="category" class="form-select text-small text-capitalize">
                        <option>all</option>
                        @foreach (\App\Models\Product::$category_list as $category)
                            <option>{{$category}}</option>
                        @endforeach
                    </select>
                </div>
    
                <input name="q" type="search" class="form-control" aria-label="Search">
            </form>
    
        </div>

        <div class="col-2 text-center">
            <a href="{{route('cart.index')}}" class="text-decoration-none">
                <img src="{{asset('img/cart.png')}}" alt="cart" width="50" height="50" class="img-fluid bg-light">
                <?php
                    if(Cart::instance('default')->content()->count() == 0
                        && auth()->check()
                    )
                    {
                        Cart::merge(auth()->id());
                    }
                ?>
                @if ($cart_items = Cart::content()->count())
                    <span class="rounded-pill pill badge bg-primary text-light">
                        {{$cart_items}}
                    </span>
                @endif
            </a>
        </div>
    
        @auth
            <div class="col-md-2 dropdown text-end">
                <a href="#" class="d-block text-decoration-none link-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-small">
                    <li>
                        <a class="dropdown-item" href="{{route('user.index')}}">
                            My Info
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('orders.index')}}">My Orders</a></li>
                    <li><a class="dropdown-item" href="{{route('cart.wishlist')}}">My Wishlist</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        @else
            <div class="col-md-2 text-end">
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Sign-up</a>
            </div>
        @endauth
    
    
    </div>
</header>