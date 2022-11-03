
<style>
    .modal-content{
        overflow: hidden;
    }
    .modal-body{
        overflow: auto;
    }    
    .check-option {
        right: 4px;
        top: 4px;
    }
    #thumbnail .dropzone {
        border-radius: 25px;
        width: 132px;
        overflow: hidden;
        padding: 4px;
    }
    #thumbnail .dropzone .dz-preview{
        margin: 0;
    }
    #gallery_container .dropzone {
        border-radius: 25px;
        padding: 0;
    }
</style>
<form action="{{ route('seller.services.gallery') }}" method="post" enctype="multipart/form-data">
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
                    <input type="hidden" name="service_id" id="service_id" value="{{$post_id}}" >
                    <input type="hidden" name="step" id="name" value="{{$step}}" class="form-control">
                    <div id="inputs"></div>
                    @include('includes.validation-form')
                    <div class="card mb-3 mb-4">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title mb-0">Thumbnail</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div id="thumbnail">
                                <div class="dropzone" id="thumbnail_dropzone"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 mb-4">
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                            <h4 class="card-header-title mb-0">Gallery</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div id="gallery_container">
                                <div class="dropzone" id="gallery_dropzone"></div>
                            </div>
                        </div>
                        <!-- Body -->
                    </div>
                </div>
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

<div id='ajaxCalls'>
</div>

@section('js')
<script src="{{ asset('dropzone/js/dropzone.js') }}"></script>
<script>
    var currentFile = null;
    Dropzone.autoDiscover = false;
    $(document).ready(function() {
        $("#thumbnail_dropzone").dropzone({
            method:'post',
            url: "{{ route('seller.file.store') }}",
            dictDefaultMessage: "Select photos",
            paramName: "file",
            maxFilesize: 2,
            maxFiles: 1,
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/*",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: (file, response) => {
                var inputs = $("#inputs");
                var last = $("#thumb");

                if(last.length) {
                    last.val(response)
                } else {
                    inputs.append($(`<input type="hidden" id="thumb" name="thumb" value="${response}"></input>`))
                }
                // ONLY DO THIS IF YOU KNOW WHAT YOU'RE DOING!
            }
        })
        $("#gallery_dropzone").dropzone({
            method:'post',
            url: "{{ route('seller.file.store') }}",
            dictDefaultMessage: "Select photos",
            paramName: "file",
            maxFilesize: 2,
            clickable: true,
            // addRemoveLinks: true,
            acceptedFiles: "image/*",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: (file, response) => {
                var inputs = $("#inputs");
                var last = $("#gallery");

                var lastValue = [];
                console.log(last)
                if(last.length) {
                    lastValue = [last.val()]
                } else {
                    inputs.append($(`<input type="hidden" id="gallery" name="gallery" value=""></input>`))
                }

                console.log(lastValue, response)
                lastValue.push(response);
                last = $("#gallery");
                last.val(lastValue);
                // ONLY DO THIS IF YOU KNOW WHAT YOU'RE DOING!
            }
        })
    });
</script>
@endsection