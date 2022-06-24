@extends('backend.dashboard.layouts.app', ['activePage' => 'table', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('backend.categories.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                        <input type="text" name="name" id="name" value="" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="name">Slug:</label>
                                        <input type="text" name="slug" id="slug" value="{{ $category->slug }}" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="desc">Description:</label>
                                        <textarea name="desc" id="desc" rows="3" class="form-control">
                                            
                                        </textarea>
                                    </div>
                                    
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-lg btn-outline-success">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('js_content')
    
    <script>
         $(document).ready(function(){
            $('#desc').trumbowyg();
            $('#name').keyup(function(){
                var slug = $(this).val()
                $('#slug').val(slug.replace(/\s+/g, '_').toLowerCase());
            })
         })
    </script> 
    @endsection