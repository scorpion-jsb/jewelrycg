@extends('backend.dashboard.layouts.app', ['activePage' => 'products', 'title' => 'Create Products', 'navName' => 'Table List', 'activeButton' => 'catalogue'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('backend.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
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
                            <div class="col-md-12 mb-2">
                                <label for="category">Category:</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" name="category" data-live-search="true">
                                        @foreach ($categories as $categorie)
                                            <option value="{{$categorie->id}}" data-tokens="{{$categorie->category_name}}">{{$categorie->category_name}}</option>
                                        @endforeach
                                        
                                        </select>
                                </div>
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
            </form>
        </div>
    </div>

@endsection
