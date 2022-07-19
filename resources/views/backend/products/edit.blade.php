@extends('backend.layouts.app', ['activePage' => 'products', 'title' => 'Edit Product', 'navName' => 'Table List', 'activeButton' => 'catalogue'])

@section('content')
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link"
                                href="{{ route('backend.products.list') }}">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>

                <h1 class="page-header-title">Edit Product</h1>

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




    <form action="{{ route('backend.products.update', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('includes.validation-form')
        <div class="row">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <div class="card col-md-12">
                    <div class="card-body row">
                        @include('includes.validation-form')
                        <div class="mb-4">
                            <label for="name">Name</label>
                            <input type="text" value='{{ $product->name }}' name="name" id="name"
                                class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="name">Slug</label>
                            <input type="text" value='{{ $product->slug }}' name="slug" id="slug"
                                class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="desc">Description</label>
                            <textarea name="description" value='{{ $product->description }}' id="description" rows="3" class="form-control">{{ $product->description }}</textarea>
                        </div>

                    </div>
                </div>
                
                <div class="card mb-3 mb-lg-5 mt-3">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Media</h4>

                        <!-- Gallery link -->
                        <label class="btn text-primary p-0" id="getFileManagerForProducts">
                            Select product gallery images
                            <input type="hidden" id="all_checks" value="{{ $product->product_images }}" name="product_images">
                        </label>
                        <!-- End Gallery link -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Gallery -->
                        <div id="fancyboxGallery" class="js-fancybox row justify-content-sm-center gx-3">
                            @foreach ($uploads as $upload)
                                <div id="fileappend-{{$upload->id}}" class="col-6 col-sm-4 col-md-3 mb-3 mb-lg-5">
                                    <div class="card card-sm"><img class="card-img-top"
                                            src="{{ url('uploads/all')}}/{{ $upload->file_name}}"
                                            alt="Image Description">
                                        <div class="card-body">
                                            <div class="row col-divider text-center">
                                                <div class="col"><a class="text-body"
                                                        href="./assets/img/1920x1080/img3.jpg" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="" data-fslightbox="gallery"
                                                        data-bs-original-title="View"><i class="bi-eye"></i></a></div>
                                                <div class="col"><a onclick="removepreviewappended({{$upload->id}})"
                                                        class="text-danger" href="javascript:;"><i class="bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                            @php
                                $attributes_selected = explode(',', $product->product_attributes)    
                            @endphp
                            <select name="attributes[]" id="attributes" value="" class="form-control select2"
                                multiple="multiple" style="width: 100%;">
                                @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}" @if(in_array($attribute->id, $attributes_selected)) selected @endif data-tokens="{{ $attribute->name }}">
                                    {{ $attribute->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="name">Attributes values:</label>
                            @php
                                $values_selected = explode(',', $product->product_attribute_values)    
                            @endphp
                            <select name="values[]" id="product_attribute_values" value="" class="form-control select2"
                                multiple="multiple" style="width: 100%;">
                                
                                @include('backend.products.attributes.values.ajax',[
                                'attributes' => $selected_values,
                                'values_selected' => $values_selected
                                ])
                            </select>
                        </div>
                        <div class="mb-4 text-right">
                            <a class="btn btn-info btn-sm pull-right" id="generatevariants">
                                Generate variants
                            </a>
                        </div>
                    </div>
                    <div class="card-body" id="variantsbody" style="overflow-x: scroll ">
                        @include('backend.products.ajax.values',[
                                'variants' => $variants,
                                'isDigital' => $product->is_digital
                                ])
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">

                <!-- Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-header-title">Status</h3>
                        <small class="text-muted">Published: 2 days ago</small>
                    </div>
                    <div class="card-body">
                        {{ $product->created_at }}
                        <br />
                        <br />
                        Seller:
                    </div>
                </div>
                <!-- End Card -->

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
                                <input type="checkbox" class="form-check-input" name="is_digital" value="1" @if($product->is_digital == 1) checked @endif id="availabilitySwitch1">
                            </span>
                        </label>
                        <label class="row form-switch mb-4" for="availabilitySwitch2">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Virtual</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" value="1" @if($product->is_virtual == 1) checked @endif class="form-check-input" id="availabilitySwitch2">
                            </span>
                        </label>
                        <label class="row form-switch" for="">
                            <span class="col-12 mb-2">
                                <span class="text-dark">Status</span>
                            </span>
                            <span class="col-12">
                            <select class="selectpicker w-100" name="status">
                                <option value="1" @if($product->status == 1) selected @endif>Published</option>
                                <option value="2" @if($product->status == 2) selected @endif>Draft</option>
                                <option value="3" @if($product->status == 3) selected @endif>Pending Review</option>
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
                            <input type="text" value='{{ $product->price }}' name="price" id="price"
                                class="form-control" placeholder="80.00...">
                        </div>
                        <div class="mb-4">
                            <label class="row form-switch mb-4" for="availabilitySwitch5">
                                <span class="col-8 col-sm-9 ms-0">
                                    <span class="text-dark">Track Quantity</span>
                                </span>
                                <span class="col-4 col-sm-3 text-end">
                                    <input type="checkbox" name="is_trackingquantity" value="1" @if($product->is_trackingquantity == 1) checked @endif class="form-check-input" id="availabilitySwitch5">
                                </span>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="quantity">Quantity in Stock</label>
                            <input type="number" value='{{ $product->quantity }}' name="quantity" id="quantity"
                                class="form-control" min="0">
                        </div>
                        <label class="row form-switch mb-4" for="availabilitySwitch3">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Backorder</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" name="is_backorder" value="1" @if($product->is_backorder == 1) checked @endif class="form-check-input" id="availabilitySwitch3">
                            </span>
                        </label>
                        <label class="row form-switch mb-4" for="availabilitySwitch4">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Made to Order</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" name="is_madetoorder" value="1" @if($product->is_madetoorder == 1) checked @endif class="form-check-input" id="availabilitySwitch4">
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
                            <label for="category" class="mb-2">Category</label>
                            <div class="col-12">
                                <select class="selectpicker w-100" name="category" data-live-search="true">
                                    <option disabled>Select category</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}"
                                            data-tokens="{{ $categorie->category_name }}">
                                            {{ $categorie->category_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="mb-2">Tags</label>
                            <select name="tags[]" id="tags" value="" class="form-control select2"
                                multiple="multiple" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option @if ($product->tags->contains('id_tag', $tag->id)) selected @endif value='{{ $tag->id }}'>
                                        {{ $tag->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
                <div class="card mb-3 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">3D Model</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <p>
                        @if ($product->product_3dpreview != null)
                            <span class="badge btn-success"> 3d model attached</span>
                        @else
                            <span class="badge btn-danger"> No 3d model attached</span>
                        @endif
                        </p>
                        <label class="btn text-primary mt-2 p-0" id="getFileManagerModel">Select 3d model</label>
                        <input type="hidden" id="fileManagerModelId" value="{{ $product->product_3dpreview }}" name="product_3dpreview">
                    </div>
                </div>
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
                            <img id="fileManagerPreview"
                                src="{{ url('uploads/all') }}/{{ $product->uploads->file_name }}"
                                style="width: 100%">
                        </div>
                        <label class="btn text-primary mt-2 p-0" id="getFileManager">Select thumbnail</label>
                        <input type="hidden" id="fileManagerId" value={{$product->product_thumbnail}} name="product_thumbnail">
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
                            <button type="button" class="btn btn-ghost-danger">Delete</button>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <div class="d-flex gap-3">
                                <button type="button" class="btn btn-ghost-light">Unpublish</button>
                                <button type="submit" class="btn btn-primary">Update Product</button>
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
        var createChecks = $('#all_checks').val().split(",");

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
        $(document).ready(function() {
            $('.select2').select2({

                tags: true,
                maximumSelectionLength: 100,
                tokenSeparators: [','],
                placeholder: "Select or type keywords",
            })
        });

        // check the digital setting turn on
        $('#availabilitySwitch1').click(function () {
            if ($('#variantsbody').html() != '') {
                var values_selected = $('#product_attribute_values').val()
                $.ajax({
                    type: 'POST',
                    url: "{{ route('backend.products.attributes.combinations') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "values": values_selected,
                        'isDigital': $('#availabilitySwitch1').prop('checked') * 1
                    },
                    success: function(result) {
                        $('#variantsbody').html(result)
                    }
                })
            }
            // getVariants($('#availabilitySwitch1').prop('checked') * 1);
        })
    </script>
@endsection
