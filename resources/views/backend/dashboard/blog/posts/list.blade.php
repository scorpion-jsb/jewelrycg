@extends('backend.dashboard.layouts.app', ['activePage' => 'posts', 'title' => 'All Post', 'navName' => 'Table List', 'activeButton' => 'blog'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Posts</h4>
                                    <p class="card-category">Manage Posts</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('backend.posts.create') }}" class="btn btn-info pull-right"> Add
                                        Post </a>
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
                                        <th>Category</th>
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

                ajax: '{{ route('backend.posts.get') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                   
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'categorie_id',
                        name: 'categorie_id'
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
