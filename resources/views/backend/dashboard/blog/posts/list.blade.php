@extends('backend.dashboard.layouts.app', ['activePage' => 'posts', 'title' => 'All Post', 'navName' => 'Table List', 'activeButton' => 'blog'])

@section('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-content-md-between">
                            <div class="mb-2 mb-md-0">
                                <h3 class="card-header-title">All Posts</h3>
                                <small class="text-muted">Manage Posts</small>
                                <a href="{{ route('backend.posts.create') }}" class="btn d-block btn-info mt-2"> Add Post </a>
                            </div>
                        </div>
                        <div class="table-responsive datatable-custom position-relative">

                                <table class="table table-lg table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer">
                                    <thead class="thead-light">
                                        <th>ID</th>
                                       
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($posts as $post)
                                        <tr>
                                        <td>{{ $post->id }}</td>
                                       
                                        <td>{{ $post->name }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->categorie_id }}</td>
                                        <td>
                                            <a href="{{ route('backend.posts.edit', $post->id) }}" class="btn btn-white btn-sm" 
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
