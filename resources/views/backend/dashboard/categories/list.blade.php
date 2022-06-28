@extends('backend.dashboard.layouts.app', ['activePage' => 'categories', 'title' => 'Product Categories', 'navName' => 'productscategories', 'activeButton' => 'catalogue'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">Product Categories</h1>
    </div>
    <!-- End Row -->
</div>  

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Categories</h4>
                                    <p class="card-category">Manage Categories</p>
                                </div>

                                <div class="col-md-6">
                                    <a href="{{ route('backend.categories.create') }}" class="btn btn-info pull-right">
                                        Add
                                        Categorie </a>
                                </div>
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
