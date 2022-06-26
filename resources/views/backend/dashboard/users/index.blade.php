<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-sm mb-2 mb-sm-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-no-gutter">
            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav>

        <h1 class="page-header-title">Users</h1>
        </div>
        <!-- End Col -->

        <div class="col-sm-auto">
        <a class="btn btn-primary" href="./users-add-user.html">
            <i class="bi-person-plus-fill me-1"></i> Add user
        </a>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<!-- End Page Header -->



    <div class="wrapper ">

        <div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
        
        Tip 2: you can also add an image using data-image tag
        -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        {{ __("Creative Tim") }}
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('dashboard')}}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>{{ __("Dashboard") }}</p>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#laravelExamples" aria-expanded="true">
                            <i>
                                <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                            </i>
                            <p>
                                {{ __('Laravel example') }}
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse  show " id="laravelExamples">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('profile.edit')}}">
                                        <i class="nc-icon nc-single-02"></i>
                                        <p>{{ __("User Profile") }}</p>
                                    </a>
                                </li>
                                <li class="nav-item  active">
                                    <a class="nav-link" href="{{route('user.index')}}">
                                        <i class="nc-icon nc-circle-09"></i>
                                        <p>{{ __("User Management") }}</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
        
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('page.index', 'table')}}">
                            <i class="nc-icon nc-notes"></i>
                            <p>{{ __("Table List") }}</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('page.index', 'typography')}}">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>{{ __("Typography") }}</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('page.index', 'icons')}}">
                            <i class="nc-icon nc-atom"></i>
                            <p>{{ __("Icons") }}</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('page.index', 'maps')}}">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>{{ __("Maps") }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page.index', 'notifications')}}">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>{{ __("Notifications") }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-danger" href="{{route('page.index', 'upgrade')}}">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>{{ __("Upgrade to PRO") }}</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>                <div class="fixed-plugin">
<div class="dropdown show-dropdown">
    <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
    </a>
    <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Style</li>
        <li class="adjustments-line">
            <a href="javascript:void(0)" class="switch-trigger">
                <p>Background Image</p>
                <label class="switch">
                    <div class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 72px;"><div class="bootstrap-switch-container" style="width: 122px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 50px;">ON</span><span class="bootstrap-switch-label" style="width: 30px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-primary" style="width: 50px;">OFF</span><input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"></div></div>
                    <span class="toggle"></span>
                </label>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="adjustments-line">
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <p>Filters</p>
                <div class="pull-right">
                    <span class="badge filter badge-black" data-color="black"></span>
                    <span class="badge filter badge-azure" data-color="azure"></span>
                    <span class="badge filter badge-green" data-color="green"></span>
                    <span class="badge filter badge-orange" data-color="orange"></span>
                    <span class="badge filter badge-red" data-color="red"></span>
                    <span class="badge filter badge-purple active" data-color="purple"></span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="header-title">Sidebar Images</li>
        <li class="active">
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="{{ asset('/light-bootstrap/img/sidebar-1.jpg') }}" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="{{ asset('/light-bootstrap/img/sidebar-3.jpg') }}" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="{{ asset('/light-bootstrap/img/sidebar-4.jpg') }}" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="{{ asset('/light-bootstrap/img/sidebar-5.jpg') }}" alt="" />
            </a>
        </li>
        <li class="button-container">
            <div class="">
                <a href="https://www.creative-tim.com/product/light-bootstrap-dashboard-laravel" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
            </div>
        </li>
        <li class="button-container">
            <div class="">
                <a href="https://light-bootstrap-dashboard-laravel.creative-tim.com/docs/tutorial-components.html" target="_blank" class="btn btn-default btn-block btn-fill">View Documentation</a>
            </div>
        </li>
        <li class="header-title pro-title text-center">Want more components?</li>
        <li class="button-container">
            <div class="">
                <a href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro-laravel" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
            </div>
        </li>
        <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>
        <li class="button-container">
            <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre twitter-sharrre"><i class="fa fa-twitter"></i>· 256</button>
            <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre facebook-sharrre"><i class="fa fa-facebook-square"></i>· 426</button>
        </li>
    </ul>
</div>
</div>            
        <div class=" main-panel ">
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"> </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">{{ __('Dashboard') }}</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">{{ __('Notification') }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">{{ __('Notification 1') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Notification 2') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Notification 3') }}3</a>
                                    <a class="dropdown-item" href="#">{{ __('Notification 4') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Another notification') }}</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;{{ __('Search') }}</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav   d-flex align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href=" {{route('profile.edit') }} ">
                                    <span class="no-icon">{{ __('Account') }}</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">{{ __('Dropdown') }}</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">{{ __('Action') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Another action') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Something') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Something else here') }}</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">{{ __('Separated link') }}</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a class="text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Log out') }} </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>                    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card data-tables">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                                <p class="text-sm mb-0">
                                    This is an example of user management. This is a minimal setup in order to get started fast.
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-default">Add user</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                                                                            </div>

                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr><th>Name</th>
                                <th>Email</th>
                                <th>Start</th>
                                <th>Actions</th>
                            </tr></thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Start</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            
                                                                        <tr>
                                        <td>Admin Admin</td>
                                        <td>admin@lightbp.com</td>
                                        <td>2020-02-25 12:37:04</td>
                                        <td class="d-flex justify-content-end">
                                                
                                                <a href="#"><i class="fa fa-edit"></i></a>
                                                                                        </td>
                                    </tr>
                                                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-danger">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>
            This is a <b>PRO</b> feature!</span>
        </div>
    </div>
</div>
            <footer class="footer">
<div class="container -fluid ">
    <nav>
        <ul class="footer-menu">
            <li>
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li>
                <a href="https://www.updivision.com" class="nav-link" target="_blank">Updivision</a>
            </li>
            <li>
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li>
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
        </ul>
        <p class="copyright text-center">
            ©
            <script>
                document.write(new Date().getFullYear())
            </script>2020
            <a href="http://www.creative-tim.com">Creative Tim</a> &amp; <a href="https://www.updivision.com">Updivision</a> , made with love for a better web
        </p>
    </nav>
</div>
</footer>            </div>

    </div>
   

