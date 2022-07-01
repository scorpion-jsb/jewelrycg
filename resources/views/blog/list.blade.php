<x-app-layout page-title="Blog">
<section class="p-6">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="fw-600 h4">Blog</h1>
            </div>
            <div class="col-lg-12">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="/">Home</a>
                        
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="/blog">"Blog"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="page-header">
    <div class="row align-items-center mb-3">
        <div class="col-sm mb-2 mb-sm-0">
            <h1 class="page-header-title">Post <span class="badge bg-soft-dark text-dark ms-2">72,031</span></h1>
        </div>
        <!-- End Col -->

        <div class="col-sm-auto">
            <a class="btn btn-primary" href="{{ route('backend.posts.create') }}">Create post</a>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<section class="bg-white pb-4">
    <div class="container">
        <div class="col-xl-11 mx-auto">
            <div class="row gutters-10 row-cols-lg-3 row-cols-md-2 row-cols-1">
                @foreach ($posts as $post)

                <div class="col mb-3">
                    <div class="blog-post-list-container">
                        <a href="/{{ $post->slug }}" class="text-reset d-block">
                            <img src="{{ featured_image }}" alt="{{ $post->name }}" class="img-blog-cropped lazyloaded">
                        </a>
                        <div class="p-2 pt-3">
                            <h2 class="fs-18 fw-600 mb-1">
                                <a href="/{{ $post->slug }}" class="text-reset article-list-title">
                                    {{ $post->name }}
                                </a>
                            </h2>
                            @foreach($post->categories as $category_info)
                                <div class="mb-2 opacity-50 article-list-category">
                                    <a href="/{{ $post->slug }}" >{{$category_info->category->category_name}}</a>
                                </div>
                            @endforeach
                            <p class="opacity-70 mb-4 article-list-excerpt">{{-- excerpt --}}</p>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</section>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            
                        </div>
                        <div class="table-responsive datatable-custom position-relative">

                                <table class="table table-lg table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer">
                                    <thead class="thead-light">
                                        <th class="table-column-pe-0 sorting_disabled" aria-label="">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                                <label class="form-check-label" for="datatableCheckAll"></label>
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Categories</th>
                                        <th>Actions</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($posts as $post)
                                        <tr>
                                        <td class="table-column-pe-0">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordersCheck1">
                                                <label class="form-check-label" for="ordersCheck1"></label>
                                            </div>
                                        </td>
                                        <td>{{ $post->id }}</td>
                                       
                                        <td>{{ $post->name }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>
                                            @foreach($post->categories as $category_info)
                                                <p><span class="badge btn-info"> {{$category_info->category->category_name}} </span>  </p>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-white btn-sm" target="_blank" href="#"> <i class="bi-eye"></i> View </a>
                                                <!-- Button Group -->
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="ordersExportDropdown1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="ordersExportDropdown1" style="">
                                                        <span class="dropdown-header">Options</span>
                                                        <a href="{{ route('backend.posts.edit', $post->id) }}" class="js-export-print dropdown-item">
                                                            <i class="bi-pencil-fill me-1"></i> Edit Post
                                                        </a>
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



</x-app-layout>
