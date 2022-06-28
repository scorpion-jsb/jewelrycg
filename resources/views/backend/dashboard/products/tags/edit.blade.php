@extends('backend.dashboard.layouts.app', ['activePage' => 'categories', 'title' => 'Edit Product Tag', 'navName' => 'productstags', 'activeButton' => 'catalogue'])

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">Edit Product Tag</h1>
    </div>
    <!-- End Row -->
</div>

            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('backend.product.tags.update', $tag->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-center">
                            <div class="card col-md-12">
                                <div class="card-body row">
                                    @include('includes.validation-form')
                                    <div class="col-md-6 mb-2">
                                        <label for="name">Name:</label>
                                        <input value="{{ $tag->name }}" type="text" name="name" id="name" value="" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="name">Slug:</label>
                                        <input type="text" value="{{ $tag->slug }}" name="slug" id="slug" value="" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="desc">Description:</label>
                                        <textarea name="description" value="{{ $tag->description }}" id="desc" rows="3" class="form-control">
                                            {{ $tag->description }}
                                        </textarea>
                                    </div>
                                    
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-lg btn-outline-success">Update</button>
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
            $('#name').keyup(function(){
                var slug = $(this).val()
                
                if(slug.charAt(slug.length - 1) != " ")
                {
                    $('#slug').val(slug.replace(/\s+/g, '-').toLowerCase());
                }
                
            })

            $('.select2').select2({
            data: ["Piano", "Flute", "Guitar", "Drums", "Photography"],
            tags: true,
            maximumSelectionLength: 10,
            tokenSeparators: [',', ' '],
            placeholder: "Select or type keywords",
            })
         })
    </script> 
    @endsection
