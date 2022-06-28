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

                <div class="card col-md-12">
                    <div class="card-body row">
                        @include('includes.validation-form')
                        <div class="col-md-12 mb-2">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="desc">Description:</label>
                            <textarea name="desc" id="desc" rows="3" class="form-control">
                            </textarea>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="price">Price:</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="80.00...">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="qty">Quantity in Stock:</label>
                            <input type="number" name="qty" id="qty" class="form-control" min="0">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="category">Category:</label>
                            <div class="col-md-12">
                                <select style="width:100%" class="selectpicker" name="category" data-live-search="true">
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}" data-tokens="{{$categorie->category_name}}">{{$categorie->category_name}}</option>
                                    @endforeach
                                    
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="name">Tags:</label>
                            <select  name="tags[]" id="tags" value="" class="form-control select2"  multiple="multiple" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option value='{{ $tag->id }}'> {{ $tag->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label
                                for="images">Images</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit"
                                class="btn btn-lg btn-outline-success">Add</button>
                        </div>

                    </div>
                </div>
    
        </div>
        <div class="col-lg-4">

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
