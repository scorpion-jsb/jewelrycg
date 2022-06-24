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
            <li class="nav-item @if($activePage == 'icons') active @endif">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-delivery-fast"></i>
                    <p>{{ __("Vendors") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'maps') active @endif">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-cart-simple"></i>
                    <p>{{ __("Orders") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'notifications') active @endif">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-quote"></i>
                    <p>{{ __("Blog") }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
