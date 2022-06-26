@extends('backend.dashboard.layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
<main id="content" role="main" class="main">
<!-- Content -->
<div class="content container-fluid">
    <div class="row justify-content-lg-center pt-lg-5 pt-xl-10">
    <div class="col-lg-9 col-xl-8">
        <!-- Title -->
        <div class="text-center mb-7">
        <h1 class="display-4">Layouts</h1>
        <p>Customize your overview page layout. Choose the one that best fits your needs.</p>
        </div>
        <!-- End Title -->

        <span class="divider-center">Demo layouts</span>

        <div class="row my-5 mb-lg-7">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/demo-layouts-default-classic.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/demo-layouts-default-classic.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/demo-layouts-default-classic.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Default <span>(Classic)</span></h5>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/demo-layouts-nav-tabs.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/demo-layouts-nav-tabs.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/demo-layouts-nav-tabs.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Nav Tabs</h5>
            </div>
            <!-- End Card -->
        </div>
        </div>
        <!-- End Row -->

        <span class="divider-center">Header</span>

        <div class="row my-5 mb-lg-7">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/header-default-container.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/header-default-container.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/header-default-container.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Default</h5>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/header-double-line-container.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/header-double-line-container.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/header-double-line-container.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Double line</h5>
            </div>
            <!-- End Card -->
        </div>
        </div>
        <!-- End Row -->

        <span class="divider-center">Sidebar</span>

        <div class="row my-5 mb-lg-7">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/sidebar-default-classic.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/sidebar-default-classic.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/sidebar-default-classic.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Default <span class="text-body">(Classic)</span></h5>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/sidebar-compact.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/sidebar-compact.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/sidebar-compact.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Compact</h5>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/sidebar-mini.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/sidebar-mini.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/sidebar-mini.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Mini</h5>
            </div>
            <!-- End Card -->
        </div>
        </div>
        <!-- End Row -->

        <span class="divider-center">Sidebar Combinations</span>

        <div class="row my-5 mb-lg-7">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/sidebar-combinations-mini-plus-one-cols.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/sidebar-combinations-mini-plus-one-cols.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/sidebar-combinations-mini-plus-one-cols.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Mini + one columns</h5>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/sidebar-combinations-two-cols.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/sidebar-combinations-two-cols.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/sidebar-combinations-two-cols.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Two columns</h5>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/sidebar-combinations-two-plus-mini-cols.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/sidebar-combinations-two-plus-mini-cols.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/sidebar-combinations-two-plus-mini-cols.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Two + mini columns</h5>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/sidebar-combinations-two-cols-between.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/sidebar-combinations-two-cols-between.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/sidebar-combinations-two-cols-between.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Two columns between</h5>
            </div>
            <!-- End Card -->
        </div>
        </div>
        <!-- End Row -->

        <span class="divider-center">Sidebar Detached</span>

        <div class="row my-5 mb-lg-7">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/sidebar-detached-container.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/sidebar-detached-container.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/sidebar-detached-container.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Container</h5>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/sidebar-detached-overlay-container.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/sidebar-detached-overlay-container.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/sidebar-detached-overlay-container.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Overlay</h5>
            </div>
            <!-- End Card -->
        </div>
        </div>
        <!-- End Row -->

        <span class="divider-center">Content Combinations</span>

        <div class="row my-5 mb-lg-7">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/content-combinations-content-centered.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/content-combinations-content-centered.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/content-combinations-content-centered.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Medium content centered</h5>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/content-combinations-overlay.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/content-combinations-overlay.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/content-combinations-overlay.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Overlay</h5>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/content-combinations-container-overlay.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/content-combinations-container-overlay.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/content-combinations-container-overlay.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Container Overlay</h5>
            </div>
            <!-- End Card -->
        </div>
        </div>
        <!-- End Row -->

        <span class="divider-center">Footer</span>

        <div class="row mt-5">
        <div class="col-sm-6 col-lg-4">
            <!-- Card -->
            <a class="d-block card-transition mb-3" href="../layouts/footer-default-container.html">
            <img class="img-fluid w-100" src="../assets/svg/layouts/footer-default-container.svg" alt="Image Description" data-hs-theme-appearance="default">
            <img class="img-fluid w-100" src="../assets/svg/layouts-light/footer-default-container.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="text-center">
            <h5 class="mb-0">Default</h5>
            </div>
            <!-- End Card -->
        </div>
        </div>
        <!-- End Row -->
    </div>
    </div>
    <!-- End Row -->
</div>
<!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Email Statistics') }}</h4>
                            <p class="card-category">{{ __('Last Campaign Performance') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Bounce') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Unsubscribe') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Campaign sent 2 days ago') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Users Behavior') }}</h4>
                            <p class="card-category">{{ __('24 Hours performance') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartHours" class="ct-chart"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Click') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Click Second Time') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('2017 Sales') }}</h4>
                            <p class="card-category">{{ __('All products including Taxes') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartActivity" class="ct-chart"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Tesla Model S') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('BMW 5 Series') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> {{ __('Data information certified') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card  card-tasks">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Tasks') }}</h4>
                            <p class="card-category">{{ __('Backend development') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="table-full-width">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Sign contract for "What are conference organizers afraid of?"') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Lines From Great Russian Literature? Or E-mails From My Boss?') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Create 4 Invisible User Experiences you Never Knew About') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Read "Following makes Medium better"') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Unfollow 5 enemies from twitter') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="now-ui-icons loader_refresh spin"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush
