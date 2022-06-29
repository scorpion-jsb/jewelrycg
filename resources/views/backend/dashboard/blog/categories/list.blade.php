@extends('backend.dashboard.layouts.app', ['activePage' => 'posts', 'title' => 'All Categories', 'navName' => 'blogcategories', 'activeButton' => 'blog'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">All Categories</h1>
    </div>
    <!-- End Row -->
</div>    

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Manage Blog Categories</h4>
                                    <a href="{{ route('backend.blog.categories.create') }}" class="btn btn-info mt-2">Add Blog Category</a>
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
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-white btn-sm" target="_blank" href="{{ route('backend.blog.categories.edit', $categorie->id) }}"> <i class="bi-eye"></i> Edit </a>
                                            <!-- Button Group -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="ordersExportDropdown1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="ordersExportDropdown1" style="">
                                                    <span class="dropdown-header">Options</span>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="javascript:;"> <i class="bi-trash dropdown-item-icon"></i> Delete </a>
                                                </div>
                                            </div>
                                            <!-- End Unfold -->
                                        </div>
                                        <!-- End Button -->

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
