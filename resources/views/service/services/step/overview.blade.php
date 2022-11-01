    <form action="{{ route('seller.services.store') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                @csrf
                <div class="card col-md-12 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title mb-0">Service information</h4>
                    </div>
                    <!-- End Header -->
                    <div class="card-body">
                        <input type="hidden" name="step" id="name" value="{{$step}}" class="form-control">
                        @include('includes.validation-form')
                        <div class="mb-2">
                            <label for="name" class="w-100 mb-2">Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="desc" class="w-100 mb-2">Service:</label>
                            <textarea name="content" id="desc" rows="6" class="form-control">{{ old('content') }}</textarea>
                        </div>
                        <!-- <div class="mb-4 col-12">
                            <div class="col-12">
                                <label class="mb-2" for="">Status</label>
                                <select class="selectpicker w-100" name="status">
                                    <option value="1" selected>Published</option>
                                    <option value="2" >Draft</option>
                                    <option value="3" >Pending Review</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="mb-4 col-12">
                            <label for="category" class="w-100 mb-2">Category</label>
                            <div class="col-4">
                                <select class="selectpicker form-control" name="categories[]" data-live-search="true" data-container="body">
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}" data-tokens="{{$categorie->category_name}}">{{$categorie->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="w-100 mb-2">Tags:</label>
                            <select  name="tags[]" id="tags" value="" class="form-control select2"  multiple="multiple" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option value='{{ $tag->id }}'> {{ $tag->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-3 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title mb-0">Thumbnail</h4>
                    </div>
                    <!-- End Header -->
    
                    <!-- Body -->
                    <div class="card-body">
                        <div class="imagePreview1 img-thumbnail p-2">
                            <img id="fileManagerPreview1" src="" style="width: 100%">
                        </div>
                        <label class="btn text-primary mt-2 p-0" id="getFileManager1">Select thumbnail</label>
                        <input type="hidden" id="fileManagerId1" name="thumbnail" value="{{ old('thumbnail') }}">
                    </div>
                </div>
                <div class="card mb-3 mb-4">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title mb-0">Gallery</h4>
    
                        <!-- Gallery link -->
                        <label class="btn text-primary p-0" id="gallery">
                            Select Service gallery images
                            <input type="hidden" id="all_checks" value="{{ old('gallery') }}" name="gallery">
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
            </div>
        </div>

        <div class="row justify-content-center justify-content-sm-between">
            <div class="col">
            <a type="button" class="btn btn-danger" href="{{route('seller.services.list')}}">Cancel</a>
            </div>
            <!-- End Col -->

            <div class="col-auto">
            <div class="d-flex gap-3">
                <!-- <button type="button" class="btn btn-light">Save Draft</button> -->
                <button type="submit" class="btn btn-primary">Save & Continue</button>
            </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Card -->
      </div>
    </form>
    <div id="fileManagerContainer"></div>

    <div id='ajaxCalls'>
    </div>

@section('js')
    <script>
        var createChecks = [];

        function removepreviewappended(id) {
            createChecks = jQuery.grep(createChecks, function(value) {
                return value != id;
            });
            $('#fileappend-' + id).remove();
            $('#all_checks').val(createChecks);
        }

        $('.select2').select2({
            tags: true,
            maximumSelectionLength: 10,
            tokenSeparators: [','],
            placeholder: "Select or type keywords",
        })

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

        $('#gallery').click(function () {
            $.ajax({
                url: "{{ route('seller.file.show') }}",
                success: function (data) {
                    if (!$.trim($('#fileManagerContainer').html()))
                        $('#fileManagerContainer').html(data);

                    $('#fileManagerModal').modal('show');

                    const getSelectedItem = function (selectedId, filePath) {
                        $('#fancyboxGallery').empty();

                        createChecks = selectedId;
                        $('#all_checks').val(createChecks);

                        selectedId.map(function (id, i) {
                            $('#fancyboxGallery').prepend(productImageDiv(id, filePath[i]));
                        });
                    }

                    setSelectedItemsCB(getSelectedItem, createChecks);
                }
            })
        });

        $('#getFileManager1').click(function () {
            $.ajax({
                url: "{{ route('seller.file.show') }}",
                success: function (data) {
                    if (!$.trim($('#fileManagerContainer').html()))
                        $('#fileManagerContainer').html(data);

                    $('#fileManagerModal').modal('show');

                    const getSelectedItem = function (selectedId, filePath) {

                        $('#fileManagerId1').val(selectedId);
                    }

                    setSelectedItemsCB(getSelectedItem, $('#fileManagerId1').val() == '' ? [] : [$('#fileManagerId1').val()], false);
                }
            })
        });

    </script>
@endsection