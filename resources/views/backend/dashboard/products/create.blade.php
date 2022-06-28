@extends('backend.dashboard.layouts.app', ['activePage' => 'products', 'title' => 'Add Product', 'navName' => 'addproduct', 'activeButton' => 'catalogue'])

@section('content')

<div class="page-header">
    <div class="row align-items-center">
        <div class="col-sm mb-2 mb-sm-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-no-gutter">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('backend.products.list') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </nav>

            <h1 class="page-header-title">Add Product</h1>

            <div class="mt-2">
                <a class="text-body me-3" href="javascript:;">
                    <i class="bi-clipboard me-1"></i> Duplicate
                </a>
                <a class="text-body" href="#">
                    <i class="bi-eye me-1"></i> Preview
                </a>
            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>

<form action="{{ route('backend.products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-8 mb-3 mb-lg-0">
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Product information</h4>
                </div>
                <!-- End Header -->
                <div class="card-body">
                    @include('includes.validation-form')
                    <div class="mb-4">
                        <label for="productNameLabel" class="form-label">Name </label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="desc">Description:</label>
                        <textarea name="desc" id="desc" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="qty">Quantity in Stock:</label>
                        <input type="number" name="qty" id="qty" class="form-control" min="0">
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label
                            for="images">Images</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            
            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                <h4 class="card-header-title">Pricing</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <div class="mb-4">
                        <label for="priceNameLabel" class="form-label">Price</label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="80.00...">
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                <h4 class="card-header-title">Options</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <div class="mb-4">
                        <label for="priceNameLabel" class="form-label">Digital?</label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="80.00...">
                    </div>
                    <div class="mb-4">
                        <label for="priceNameLabel" class="form-label">Virtual?</label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="80.00...">
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                <h4 class="card-header-title">Organization</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <label class="row form-check form-switch" for="availabilitySwitch1">
                        <span class="col-8 col-sm-9 ms-0">
                            <span class="text-dark">Availability</span>
                        </span>
                        <span class="col-4 col-sm-3 text-end">
                            <input type="checkbox" class="form-check-input" id="availabilitySwitch1">
                        </span>
                    </label>
                    <div class="mb-4">
                        <label for="category">Category:</label>
                        <div class="col-md-12">
                            <select style="width:100%" class="form-select" name="category" data-live-search="true">
                                @foreach ($categories as $categorie)
                                    <option value="{{$categorie->id}}" data-tokens="{{$categorie->category_name}}">{{$categorie->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="name">Tags:</label>
                        <select  name="tags[]" id="tags" value="" class="form-control select2"  multiple="multiple" style="width: 100%;">
                            @foreach ($tags as $tag)
                                <option value='{{ $tag->id }}'> {{ $tag->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
</form>


@endsection

@section('js_content')
    <script>
        $('.select2').select2({
            
            tags: true,
            maximumSelectionLength: 10,
            tokenSeparators: [','],
            placeholder: "Select or type keywords",
            })
    </script>
@endsection
