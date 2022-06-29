@extends('backend.dashboard.layouts.app', ['activePage' => 'products', 'title' => 'Product Categories', 'navName' => 'productscategories', 'activeButton' => 'catalogue'])

@section('content')
<div class="page-header">
    <div class="row align-items-center mb-3">
        <div class="col-sm mb-2 mb-sm-0">
            <h1 class="page-header-title">Product Categories <span class="badge bg-soft-dark text-dark ms-2">72,031</span></h1>
        </div>
        <!-- End Col -->

        <div class="col-sm-auto">
            <a class="btn btn-primary" href="{{ route('backend.categories.create') }}">Create category</a>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header card-header-content-md-between">
                            <div class="row">

                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <div class="col-md-12">
                            <table class="table table-hover table-striped ">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Parent</th>

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
                ajax: '{{ route('backend.categories.get') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'parent_id',
                        name: 'parent_id'
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
