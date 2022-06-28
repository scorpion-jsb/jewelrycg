@extends('backend.dashboard.layouts.app', ['activePage' => 'products', 'title' => 'Edit Category', 'navName' => 'productscategories', 'activeButton' => 'catalogue'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">Edit Category</h1>
    </div>
    <!-- End Row -->
</div>  

            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('backend.categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-center">
                            <div class="card col-md-12">
                                <div class="card-body row">
                                    @include('includes.validation-form')
                                    <div class="col-md-12 mb-2">
                                        <label for="name">Name:</label>
                                        <input type="text" name="category_name" id="name" value="{{ $category->category_name }}" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="name">Parent:</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="selectpicker" name="parent_id" data-live-search="true">
                                                    <option data-tokens="Parent">Parent</option>
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{$categorie->id}}" @if($categorie->id == $category->parent_id) selected @endif data-tokens="{{$categorie->category_name}}">{{$categorie->category_name}}</option>
                                                    @endforeach
                                                  </select>
                                            </div>
                                        </div>
                                        
                                          
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="name">Slug:</label>
                                        <input type="text" name="slug" id="slug" value="{{ $category->slug }}" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="desc">Description:</label>
                                        <textarea name="category_excerpt" id="desc" rows="3" class="form-control">
                                            {{ $category->category_excerpt }}
                                        </textarea>
                                    </div>
                                    
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-lg btn-outline-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    @endsection

    @section('js_content')
    
    <script>
         $(document).ready(function(){
            $('#desc').trumbowyg();
            $('#name').keyup(function(){
                var slug = $(this).val()
                
                if(slug.charAt(slug.length - 1) != " ")
                {
                    $('#slug').val(slug.replace(/\s+/g, '-').toLowerCase());
                }
                
            })
         })
    </script> 
    @endsection
