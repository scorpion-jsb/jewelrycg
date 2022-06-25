<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                {{ __("jewelrycadfiles") }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
           
            
            
            <li class="nav-item @if($activePage == 'table') active @endif">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __("User Profile") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'users') active @endif">
                <a class="nav-link" href="{{ route('backend.users.list') }}">
                    <i class="fa-solid fa-users"></i>
                    <p>{{ __("Users Management") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples" @if($activeButton =='laravel') aria-expanded="true" @endif>
                    <i class="fa-solid fa-bars-staggered"></i>
                    <p>
                        {{ __('Catalogue') }}
                        
                    </p>
                    <span class="pull-right">
                        <i class="fa-solid fa-angle-down"></i>
                        </span>
                </a>
                
            </li>
            <div class="collapse @if($activeButton =='catalogue') show @endif" id="laravelExamples">
                <ul class="nav" style="    border-left: 6px solid #7f6c9d; background: #584080;" >
                    <li class="nav-item @if($activePage == 'products') active @endif">
                        <a class="nav-link" href="{{ route('backend.products.list') }}">
                            <i class="fa-brands fa-product-hunt"></i>
                            <p>{{ __("Products") }}</p>
                        </a>
                    </li>
                    <li class="nav-item @if($activePage == 'categories') active @endif">
                        <a class="nav-link" href="{{ route('backend.categories.list') }}">
                            <i class="fa-solid fa-list-ol"></i>
                            <p>{{ __("Categories") }}</p>
                        </a>
                    </li>
                    <li class="nav-item @if($activePage == 'sellers') active @endif">
                        <a class="nav-link" href="{{ route('backend.sellers.list') }}">
                            <i class="nc-icon nc-delivery-fast"></i>
                            <p>{{ __("Sellers") }}</p>
                        </a>
                    </li>
                </ul>
            </div>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#blog" @if($activeButton =='laravel') aria-expanded="true" @endif>
                    <i class="fa-solid fa-blog"></i>
                    <p>
                        {{ __('Blog') }}
                        
                    </p>
                    <span class="pull-right">
                        <i class="fa-solid fa-angle-down"></i>
                        </span>
                </a>
                
            </li>
            <div class="collapse @if($activeButton =='blog') show @endif" id="blog">
                <ul class="nav" style="    border-left: 6px solid #7f6c9d; background: #584080;" >
                    <li class="nav-item @if($activePage == 'products') active @endif">
                        <a class="nav-link" href="{{ route('backend.products.list') }}">
                            <i class="fa-solid fa-align-left"></i>
                            <p>{{ __("Blogs list") }}</p>
                        </a>
                    </li>
                    <li class="nav-item @if($activePage == 'categories') active @endif">
                        <a class="nav-link" href="{{ route('backend.categories.list') }}">
                            <i class="fa-solid fa-list-ol"></i>
                            <p>{{ __("Categories") }}</p>
                        </a>
                    </li>
                </ul>
            </div>
            <li class="nav-item @if($activePage == 'maps') active @endif">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-cart-simple"></i>
                    <p>{{ __("Orders") }}</p>
                </a>
            </li>
            
            
        </ul>
    </div>
</div>
