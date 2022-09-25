@extends('backend.layouts.app', ['activePage' => 'coupons', 'title' => 'Create Coupon', 'navName' => 'addcoupon', 'activeButton' => 'blog'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">Create coupon</h1>
    </div>
    <!-- End Row -->
</div>
<form action="{{ route('backend.coupons.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card col-md-12 mb-4">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title mb-0">Coupon information</h4>
                </div>

                <!-- End Header -->
                <div class="card-body row">
                    @include('includes.validation-form')
                    <div class="mb-2">
                        <label for="txtName" class="w-100 mb-2">Name:</label>
                        <input type="text" name="name" id="txtName" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="selType" class="w-100 mb-2">Type:</label>
                        <select name="type" id="selType" class="form-control">
                            <option value="0" {{ old('type') == 0 ? "selected" : "" }}>Fiat</option>
                            <option value="1" {{ old('type') == 1 ? "selected" : "" }}>Percentage</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="txtLimit" class="w-100 mb-2">Limit:</label>
                        <input type="text" name="limit" id="txtLimit" value="{{ old('limit') }}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
        <!-- Card -->
        <div class="card card-sm bg-dark border-dark mx-2">
            <div class="card-body">
                <div class="row justify-content-center justify-content-sm-between">
                    <div class="col">
                        <button type="button" class="btn btn-danger">Cancel</button>
                    </div>
                    <!-- End Col -->

                <div class="col-auto">
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary">Create</button>
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
