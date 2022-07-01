<header class="navbar navbar-expand-lg py-3">
    <nav class="container">
        <a class="navbar-brand col-auto" href="{{ route('index') }}">
                <!--
                <img src="{{ asset('img/logo.png') }}" width="50" height="50" alt="logo">
                <img class="logo" src="https://districtgurus.com/public/uploads/all/SC008HOLHmfOeB8E3SxNDONHI7nad1YJcmSl0ds9.png" data-src="https://districtgurus.com/public/uploads/all/SC008HOLHmfOeB8E3SxNDONHI7nad1YJcmSl0ds9.png" alt="District Gurus">-->
                #JewelryCG
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form method="get" action="{{route('products.search')}}" class="d-flex col-xl-6 col-lg-4">
    
                <div class="mr-10px">
                    <select name="category" class="form-select text-small text-capitalize">
                        <option>All</option>
                        @foreach (\App\Models\Product::$category_list as $category)
                            <option {{ request()->category == $category ? 'selected' : null }}>{{$category}}</option>
                        @endforeach
                    </select>
                </div>
    
                <input name="q" type="search" class="form-control me-2" placeholder="Search" aria-label="Search">
            </form>

            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown menu-area">
                    <a class="nav-link active" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item dropdown menu-area">
                    <a class="nav-link active" href="{{ route('shop_index') }}">3D Models</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" aria-current="page" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Learn</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('blog') }}">Blog</a></li>
                        <li><a class="dropdown-item" href="{{ route('categoryAll') }}">Categories</a></li>
                        <li><a class="dropdown-item" href="{{ route('tagAll') }}">Tags</a></li>
                        <li><a class="dropdown-item" href="#">Comments</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown menu-area">
                    <a href="{{route('cart.index')}}" class="nav-link">
                        <i class="bi bi-cart2"></i>
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
                </li>

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" aria-current="page" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{route('user.index', auth()->user()->id)}}">My Info</a></li>
                        <li><a class="dropdown-item" href="{{route('orders.index')}}">{{ auth()->user()->is_admin ? 'All Orders' : 'My Orders' }}</a></li>
                        <li><a class="dropdown-item" href="{{route('cart.wishlist')}}">My Wishlist</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @if (auth()->user()->is_admin)
                            <li><a class="dropdown-item" href="{{route('products.create')}}">Add New Product</a></li>
                            <li><hr class="dropdown-divider"></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item ml-1">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>  
                </li>
                <li class="nav-item ml-1">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>  
                </li>
                @endauth

            </ul>
        </div>
    </nav>
</header>
