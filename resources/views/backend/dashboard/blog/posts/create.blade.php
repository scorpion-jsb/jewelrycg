@extends('backend.dashboard.layouts.app', ['activePage' => 'posts', 'title' => 'Add Post', 'navName' => 'addpost', 'activeButton' => 'blog'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">Add new post</h1>
    </div>
    <!-- End Row -->
</div>    
    <form action="{{ route('backend.posts.store') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                @csrf
                <div class="justify-content-center">
                    <div class="card col-md-12 mb-4">
                        <div class="card-body row">
                            @include('includes.validation-form')
                            <div class="col-md-12 mb-2">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="category">Category:</label>
                                    <div class="col-md-12">
                                        <select style="width:100%" class="selectpicker" name="categories[]" data-live-search="true" data-container="body">
                                            @foreach ($categories as $categorie)
                                                <option value="{{$categorie->id}}" data-tokens="{{$categorie->category_name}}">{{$categorie->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="name">Slug:</label>
                                <input type="text" name="slug" id="slug" value="" class="form-control">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="name">Tags:</label>
                                <select  name="tags[]" id="tags" value="" class="form-control select2"  multiple="multiple" style="width: 100%;">
                                    @foreach ($tags as $tag)
                                        <option value='{{ $tag->id }}'> {{ $tag->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="desc">Post:</label>
                                <textarea name="post" id="desc" rows="6" class="form-control"></textarea>

                            </div>

                
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-header-title">Featured Image</h3>
                    </div>
                    <div class="card-body">
                        <div class="imagePreview img-thumbnail h-400px"></div>
                        <label class="btn btn-primary">
                            Upload<input type="file" name="cover_image"
                                class="uploadFile img" value="Upload Photo"
                                style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
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
                  <button type="button" class="btn btn-ghost-light">Save Draft</button>
                  <button type="submit" class="btn btn-primary">Publish</button>
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
@endsection

@section('js_content')
    <script>
        $(document).ready(function() {
            $('#desc').trumbowyg();
            $('#name').keyup(function() {
                var slug = $(this).val()

                if (slug.charAt(slug.length - 1) != " ") {
                    $('#slug').val(slug.replace(/\s+/g, '-').toLowerCase());
                }

            })
        })
        $(".imgAdd").click(function() {
            $(this).closest(".row").find('.imgAdd').before(
                '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
            );
        });
        $(document).on("click", "i.del", function() {
            $(this).parent().remove();
        });
        $(function() {
            $(document).on("change", ".uploadFile", function() {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader)
                    return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function() { // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image",
                            "url(" + this.result + ")");
                    }
                }

            });

            $('.select2').select2({
            
            tags: true,
            maximumSelectionLength: 10,
            tokenSeparators: [','],
            placeholder: "Select or type keywords",
            })
        });
    </script>
    <script src="{{ asset('assets/vendor/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/hs.quill.js') }}"></script>
    <script>
    (function() {
        // INITIALIZATION OF QUILLJS EDITOR
        // =======================================================
        HSCore.components.HSQuill.init('.js-quill')
    });
    </script>
@endsection
