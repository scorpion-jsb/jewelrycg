<header class="bg-light">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <span class="d-flex align-items-center col-md-1 mb-2 mb-md-0">
            <a href="{{ route('index') }}">
                <img src="{{ asset('img/logo.png') }}" width="50" height="50" alt="logo">
            </a>
        </span>
    
        <div class="col-12 col-md-8 mb-2 mb-md-0 row">
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
    
        @auth
            <div class="col-md-3 dropdown text-end">
                <a href="#" class="d-block text-decoration-none link-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-small">
                    <li>
                        <a class="dropdown-item" href="#">
                            Profile
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="#">My Orders</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        @else
            <div class="col-md-3 text-end">
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Sign-up</a>
            </div>
        @endauth
    
    
    </div>
</header>