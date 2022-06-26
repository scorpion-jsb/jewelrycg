@extends('backend.dashboard.layouts.app', ['activePage' => 'posts', 'title' => 'All Categories', 'navName' => 'Table List', 'activeButton' => 'blog'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Blog Categories</h4>
                                    <p class="card-category">Manage Blog Categories</p>
                                </div>

                                <div class="col-md-6">
                                    <a href="{{ route('backend.blog.categories.create') }}" class="btn btn-info pull-right">
                                        Add Blog
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
                                <tbody>
                                    @foreach ($categories as $categorie)
                                    <tr>
                                    <td>{{ $categorie->id }}</td>
                                   
                                    <td>{{ $categorie->category_name }}</td>
                                    <td>{{ $categorie->slug }}</td>
                                    <td>{{ $categorie->parent_id }}</td>
                                    <td>
                                        <a href="{{ route('backend.blog.categories.edit', $categorie->id) }}" class="btn btn-white btn-sm" 
                                            >
                                            <i class="bi-pencil-fill me-1"></i> Edit
                                    </a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
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
                ajax: '{{ route('backend.blog.categories.get') }}',
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
