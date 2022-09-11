<x-app-layout>
    <style>
        .pur {
            width: 100%;
            margin-bottom: 8px;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-9">
        <div class="container">
            <div class="header mb-3">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('seller.dashboard') }}">Seller Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">User Dashboard</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header"><h3>Add Product</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 mb-3 mb-lg-0">
                            <div class="card mb-3 mb-lg-5">
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-header-title mb-0">Product information</h4>
                                </div>
                                <!-- End Header -->
                                <div class="card-body">
                                    @include('includes.validation-form')
                                    <div class="mb-4">
                                        <label for="productNameLabel" class="form-label">Name </label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                    </div>
            
                                    <div class="mb-4">
                                        <label for="desc">Description</label>
                                        <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 mb-lg-5">
                                <!-- Header -->
                                <div class="card-header card-header-content-between">
                                    <h4 class="card-header-title mb-0">Media</h4>
            
                                    <!-- Gallery link -->
                                    <label class="btn text-primary p-0" id="getFileManagerForProducts">
                                        Select product gallery images
                                        <input type="hidden" id="all_checks" value="{{ old('product_images') }}" name="product_images">
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
                            <div class="card mb-3 mb-lg-5">
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-header-title mb-0">Meta information</h4>
                                </div>
                                <!-- End Header -->
                                <div class="card-body">
                                    @include('includes.validation-form')
                                    <div class="mb-4">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title') }}">
                                    </div>
            
                                    <div class="mb-4">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" rows="3" class="form-control">{{ old('meta_description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="col-lg-4">
            
                            <!-- Card -->
                            <div class="card mb-3 mb-4">
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-header-title mb-0">Options</h4>
                                </div>
                                <!-- End Header -->
            
                                <!-- Body -->
                                <div class="card-body">
                                    <label class="row form-switch mb-4" for="availabilitySwitch1">
                                        <span class="col-8 col-sm-9 ms-0">
                                            <span class="text-dark">Digital</span>
                                        </span>
                                        <span class="col-4 col-sm-3 text-end">
                                            <input type="checkbox" class="form-check-input" name="is_digital" id="availabilitySwitch1" {{ old('is_digital') ? 'checked' : '' }}>
                                        </span>
                                    </label>
                                    <label class="row form-switch mb-4" for="availabilitySwitch2">
                                        <span class="col-8 col-sm-9 ms-0">
                                            <span class="text-dark">Virtual</span>
                                        </span>
                                        <span class="col-4 col-sm-3 text-end">
                                            <input type="checkbox" name="is_virtual" class="form-check-input" id="availabilitySwitch2" {{ old('is_virtual') ? 'checked' : '' }}>
                                        </span>
                                    </label>
                                    <label class="row form-check form-switch mb-4" for="">
                                        <div class="col-12 mb-2">
                                            <span class="text-dark" cla>Status</span>
                                        </div>
                                        <div class="col-12">
                                            <select class="selectpicker w-100" name="status">
                                                <option value="1" selected>Published</option>
                                                <option value="2" >Draft</option>
                                                <option value="3" >Pending Review</option>
                                            </select>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <!-- End Card -->
            
                            <!-- Card -->
                            <div class="card mb-3 mb-4">
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-header-title mb-0">Pricing + Stock</h4>
                                </div>
                                <!-- End Header -->
            
                                <!-- Body -->
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label for="priceNameLabel" class="form-label">Price</label>
                                        <input type="text" name="price" id="price" class="form-control" placeholder="0.00" value="{{ old('price', 0.00) }}">
                                    </div>
                                    <label class="row form-switch mb-4" for="availabilitySwitch5">
                                        <span class="col-8 col-sm-9 ms-0">
                                            <span class="text-dark">Track Quantity</span>
                                        </span>
                                        <span class="col-4 col-sm-3 text-end">
                                            <input type="checkbox" name="is_trackingquantity" value="1" {{ old('is_trackingquantity') ? 'checked' : '' }} class="form-check-input" id="availabilitySwitch5">
                                        </span>
                                    </label>
                                    <div class="mb-4">
                                        <label for="qty">Quantity in Stock:</label>
                                        <input type="number" name="quantity" id="quantity" {{ old('is_trackingquantity') ? '' : 'disabled' }}  class="form-control"  min="0" value="{{ old('quantity', 0) }}">
                                    </div>
                                    <label class="row form-switch mb-4" for="availabilitySwitch3">
                                        <span class="col-8 col-sm-9 ms-0">
                                            <span class="text-dark">Backorder</span>
                                        </span>
                                        <span class="col-4 col-sm-3 text-end">
                                            <input type="checkbox" name="is_backorder" {{ old('is_backorder') ? 'checked' : '' }} value="1" class="form-check-input" id="availabilitySwitch3">
                                        </span>
                                    </label>
                                    <label class="row form-switch mb-4" for="availabilitySwitch4">
                                        <span class="col-8 col-sm-9 ms-0">
                                            <span class="text-dark">Made to Order</span>
                                        </span>
                                        <span class="col-4 col-sm-3 text-end">
                                            <input type="checkbox" name="is_madetoorder" {{ old('is_madetoorder') ? 'checked' : '' }} value="1" class="form-check-input" id="availabilitySwitch4">
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <!-- End Card -->
            
                            <!-- Card -->
                            <div class="card mb-3 mb-4">
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-header-title mb-0">Organization</h4>
                                </div>
                                <!-- End Header -->
            
                                <!-- Body -->
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label for="category" class="mb-2">Category:</label>
                                        <select class="selectpicker w-100" name="category" data-live-search="true">
                                            <option disabled selected>Select category</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}" {{ old('category') == $categorie->id ? 'selected' : '' }} data-tokens="{{ $categorie->category_name }}">
                                                    {{ $categorie->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="name" class="mb-2">Tags:</label>
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
                                    <h4 class="card-header-title mb-0">3D Model</h4>
                                </div>
                                <!-- End Header -->
            
                                <!-- Body -->
                                <div class="card-body">
                                    <label class="btn text-primary mt-2 p-0" id="getFileManagerModel">Select 3d model</label>
                                    <input type="hidden" id="fileManagerModelId" name="product_3dpreview" value="{{ old('product_3dpreview') }}">
                                </div>
                            </div>
                            <!-- End Card -->
                            <!-- Card -->
                            <div class="card mb-3 mb-4">
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-header-title mb-0">Thumbnail</h4>
                                </div>
                                <!-- End Header -->
            
                                <!-- Body -->
                                <div class="card-body">
                                    <div class="imagePreview img-thumbnail p-2">
                                        <img id="fileManagerPreview" src="" style="width: 100%">
                                    </div>
                                    <label class="btn text-primary mt-2 p-0" id="getFileManager">Select thumbnail</label>
                                    <input type="hidden" id="fileManagerId" name="product_thumbnail" value="{{ old('product_thumbnail') }}">
                                </div>
                            </div>
                            <!-- End Card -->
            
                            <!-- Card -->
                            <div class="card mb-3 mb-4" @if (!old('is_digital')) style="display: none;" @endif>
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-header-title mb-0">Digital Asset File</h4>
                                </div>
                                <!-- End Header -->
            
                                <!-- Body -->
                                <div class="card-body">
                                    <label class="btn text-primary mt-2 p-0" id="getFileManagerAsset">Select asset</label>
                                    <input type="hidden" id="digital_download_assets" name="digital_download_assets" value="{{ old('digital_download_assets') }}" >
                                </div>
                            </div>
                            <!-- End Card -->
            
                            <!-- Card -->
                            <div class="card mb-3 mb-4">
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-header-title mb-0">Tax</h4>
                                </div>
                                <!-- End Header -->
            
                                <!-- Body -->
                                <div class="card-body">
                                    <label for="tax_option_id">Tax</label>
                                    <select name="tax_option_id" id="tax_option_id" class="form-control">
                                        <option value="0" {{ old('tax_option_id') == 0 ? 'selected' : '' }}>Not Taxable</option>
                                        @foreach ($taxes as $tax)
                                            <option {{ old('tax_option_id') == $tax->id ? 'selected' : '' }} value="{{ $tax->id }}">{{ $tax->name }} - {{ $tax->price / 100 }} ({{ $tax->type }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- End Card -->
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
