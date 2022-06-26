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
    <div class="content">
        <div class="container-fluid">
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
