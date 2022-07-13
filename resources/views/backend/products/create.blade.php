@extends('backend.layouts.app', ['activePage' => 'products', 'title' => 'Add Product', 'navName' => 'addproduct', 'activeButton' => 'catalogue'])

@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link"
                                href="{{ route('backend.products.list') }}">Products</a></li>
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
                            <label for="desc">Description</label>
                            <textarea name="desc" id="desc" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Media</h4>

                        <!-- Gallery link -->
                        <label class="btn text-primary p-0" id="getFileManagerForProducts">
                            Select product gallery images
                            <input type="hidden" id="all_checks" value="" name="product_images">
                        </label>
                        <!-- Gallery link -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Gallery -->
                        <div id="fancyboxGallery" class="js-fancybox row justify-content-sm-center gx-3">
                            
                        </div>
                        <!-- End Gallery -->

                        <!-- Dropzone -->

                        <!-- End Dropzone -->
                    </div>
                    <!-- Body -->
                </div>
                <div class="js-add-field card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">Variants</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="name">Attributes:</label>
                            <select name="attributes[]" id="attributes" value="" class="form-control select2"
                                multiple="multiple" style="width: 100%;">
                                @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}" data-tokens="{{ $attribute->name }}">
                                    {{ $attribute->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="name">Attributes values:</label>
                            <select name="values[]" id="product_attribute_values" value="" class="form-control select2"
                                multiple="multiple" style="width: 100%;">
                               
                            </select>
                        </div>
                        <div class="mb-4 text-right">
                            <a class="btn btn-info btn-sm pull-right" id="generatevariants">
                                Generate variants
                            </a>
                        </div>
                    </div>
                    <div class="card-body" id="variantsbody" style="overflow-x: scroll ">
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

                <!-- Card -->
                <div class="card mb-3 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Options</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <label class="row form-switch mb-4" for="availabilitySwitch1">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Digital</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" class="form-check-input" value="1" name="is_digital" id="availabilitySwitch1">
                            </span>
                        </label>
                        <label class="row form-switch mb-4" for="availabilitySwitch2">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Virtual</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" value="1" name="is_virual" class="form-check-input" id="availabilitySwitch2">
                            </span>
                        </label>
                        <label class="row form-check form-switch mb-4" for="">
                            <span class="col-4 col-sm-3 ms-0">
                                <span class="text-dark">Status</span>
                            </span>
                            <span class="col-4 col-sm-3">
                            <select class="selectpicker" name="status" style="width: 100%">
                                <option value="1" selected>Published</option>
                                <option value="2" >Draft</option>
                                <option value="3" >Pending Review</option>
                            </select>
                            </span>
                        </label>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mb-3 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Pricing + Stock</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="priceNameLabel" class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="0.00">
                        </div>
                        <div class="mb-4">
                            <label for="qty">Quantity in Stock:</label>
                            <input type="number" name="qty" id="qty" class="form-control" min="0">
                        </div>
                        <label class="row form-switch mb-4" for="availabilitySwitch1">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Backorder</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" name="is_backorder" value="1" class="form-check-input" id="availabilitySwitch1">
                            </span>
                        </label>
                        <label class="row form-switch mb-4" for="availabilitySwitch1">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Made to Order</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" name="is_madetoorder" value="1" class="form-check-input" id="availabilitySwitch1">
                            </span>
                        </label>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mb-3 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Organization</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="category">Category:</label>
                            <select style="width:100%" class="selectpicker" name="category" data-live-search="true">
                                <option disabled selected>Select category</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}" data-tokens="{{ $categorie->category_name }}">
                                        {{ $categorie->category_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="name">Tags:</label>
                            <select name="tags[]" id="tags" value="" class="form-control select2"
                                multiple="multiple" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option value='{{ $tag->id }}'> {{ $tag->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="card mb-3 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">3D Model</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <label class="btn text-primary mt-2 p-0" id="getFileManagerModel">Select 3d model</label>
                        <input type="hidden" id="fileManagerModelId" name="product_3dpreview">
                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="card mb-3 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Thumbnail</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="imagePreview img-thumbnail p-2">
                            <img id="fileManagerPreview" src="" style="width: 100%">
                        </div>
                        <label class="btn text-primary mt-2 p-0" id="getFileManager">Select thumbnail</label>
                        <input type="hidden" id="fileManagerId" name="product_thumbnail">
                    </div>
                </div>
                <!-- End Card -->

            </div>
        </div>

        <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
            <!-- Card -->
            <div class="card card-sm bg-dark border-dark mx-2">
                <div class="card-body">
                    <div class="row justify-content-center justify-content-sm-between">
                        <div class="col">
                            <button type="button" class="btn btn-ghost-danger">Cancel</button>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <div class="d-flex gap-3">
                                <button type="submit" class="btn btn-primary">Create Product</button>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </div>
    </form>

    <div id='ajaxCalls'>
    </div>
@endsection

@section('js_content')
    <script>
        var createChecks = [];

        function removepreviewappended(id) {
            createChecks = jQuery.grep(createChecks, function(value) {
                return value != id;
            });
            $('#fileappend-' + id).remove();
            $('#all_checks').val(createChecks);
        }

        function selectFileFromManagerMultiple(id, preview) {
            if ($('#file-' + id).hasClass('selected')) {
                $('#file-' + id).removeClass('selected')
                $('#file-' + id).find('.check-this').fadeOut()
                removepreviewappended(id);
            } else {
                $('#file-' + id).addClass('selected')
                $('#file-' + id).find('.check-this').fadeIn()
                createChecks.push(id)
                $('#fancyboxGallery').prepend(productImageDiv(id, preview))
            }
            $('#all_checks').val(createChecks);
        }
        $('.select2').select2({

            tags: true,
            maximumSelectionLength: 10,
            tokenSeparators: [','],
            placeholder: "Select or type keywords",
        })
    </script>
@endsection
