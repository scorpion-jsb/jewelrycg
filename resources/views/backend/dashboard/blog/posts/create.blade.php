@extends('backend.dashboard.layouts.app', ['activePage' => 'posts', 'title' => 'Add Post', 'navName' => 'Table List', 'activeButton' => 'blog'])

@section('content')
 <link rel="stylesheet" href="{{ asset('assets/vendor/quill/dist/quill.snow.css') }}">
    
    <form action="{{ route('backend.posts.store') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                @csrf
                <div class="row justify-content-center">
                    <div class="card col-md-12">
                        <div class="card-body row">
                            @include('includes.validation-form')
                            <div class="col-md-12 mb-2">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="name">Category:</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="form-select" name="categorie_id" data-live-search="true">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}"
                                                    data-tokens="{{ $categorie->category_name }}">
                                                    {{ $categorie->category_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="name">Slug:</label>
                                <input type="text" name="slug" id="slug" value="" class="form-control">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="desc">Post:</label>
                                <textarea name="post" id="desc" rows="3" class="form-control js-quill"></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-lg btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-sm-12 imgUp">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">
                        Upload<input type="file" name="cover_image"
                            class="uploadFile img" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js_content')
    <script src="{{ asset('assets/vendor/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/hs.quill.js') }}"></script>
    <script>
    (function() {
        // INITIALIZATION OF QUILLJS EDITOR
        // =======================================================
        HSCore.components.HSQuill.init('.js-quill')
    });
    </script>
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
        });
    </script>
@endsection
