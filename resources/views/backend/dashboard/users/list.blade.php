@extends('backend.dashboard.layouts.app', ['activePage' => 'users', 'title' => 'All Users', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
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

    </div>
    <!-- End Row -->
</div>
<!-- End Page Header -->

<!-- Stats -->
<div class="row">
    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
        <div class="card-body">
            <h6 class="card-subtitle mb-2">Total users</h6>

            <div class="row align-items-center gx-2">
            <div class="col">
                <span class="js-counter display-4 text-dark">24</span>
                <span class="text-body fs-5 ms-1">from 22</span>
            </div>
            <!-- End Col -->

            <div class="col-auto">
                <span class="badge bg-soft-success text-success p-1">
                <i class="bi-graph-up"></i> 5.0%
                </span>
            </div>
            <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
        <div class="card-body">
            <h6 class="card-subtitle mb-2">Active members</h6>

            <div class="row align-items-center gx-2">
            <div class="col">
                <span class="js-counter display-4 text-dark">12</span>
                <span class="text-body fs-5 ms-1">from 11</span>
            </div>

            <div class="col-auto">
                <span class="badge bg-soft-success text-success p-1">
                <i class="bi-graph-up"></i> 1.2%
                </span>
            </div>
            </div>
            <!-- End Row -->
        </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
        <div class="card-body">
            <h6 class="card-subtitle mb-2">New/returning</h6>

            <div class="row align-items-center gx-2">
            <div class="col">
                <span class="js-counter display-4 text-dark">56</span>
                <span class="display-4 text-dark">%</span>
                <span class="text-body fs-5 ms-1">from 48.7</span>
            </div>

            <div class="col-auto">
                <span class="badge bg-soft-danger text-danger p-1">
                <i class="bi-graph-down"></i> 2.8%
                </span>
            </div>
            </div>
            <!-- End Row -->
        </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
        <div class="card-body">
            <h6 class="card-subtitle mb-2">Active members</h6>

            <div class="row align-items-center gx-2">
            <div class="col">
                <span class="js-counter display-4 text-dark">28.6</span>
                <span class="display-4 text-dark">%</span>
                <span class="text-body fs-5 ms-1">from 28.6%</span>
            </div>

            <div class="col-auto">
                <span class="badge bg-soft-secondary text-secondary p-1">0.0%</span>
            </div>
            </div>
            <!-- End Row -->
        </div>
        </div>
        <!-- End Card -->
    </div>
</div>
<!-- End Stats -->


<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Users</h4>
                        <p class="card-category">Manage users</p>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('backend.users.create') }}" class="btn btn-info pull-right"> Add
                            User </a>
                    </div>
                </div>
            </div>
            <div class="card-body table-full-width table-responsive">
                <div class="col-md-12">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js_content')
    <script>
        $(function() {

            $('.table').DataTable({
                processing: true,
                serverSide: true,
                bAutoWidth: false,

                ajax: '{{ route('backend.users.get') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'is_admin',
                        name: 'is_admin'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
