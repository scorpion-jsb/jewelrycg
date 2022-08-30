@extends('backend.layouts.app', ['activePage' => 'page', 'title' => 'General Settings', 'navName' => 'addpost', 'activeButton' => 'blog'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">Settings</h1>
    </div>
    <!-- End Row -->
</div>
    <form action="{{ route('backend.page.store') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                @csrf
                <div class="card col-md-12 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title mb-0">Page information</h4>
                    </div>
                    <!-- End Header -->
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="name" class="w-100 mb-2">Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="w-100 mb-2">Slug:</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="desc" class="w-100 mb-2">Post:</label>
                            <textarea name="post" id="desc" rows="6" class="form-control">{{ old('post') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card col-md-12">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title mb-0">Meta information</h4>
                    </div>
                    <!-- End Header -->
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="meta_title" class="w-100 mb-2">Meta Title:</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="form-control">
                        </div>
                        <div class="">
                            <label for="meta_description" class="w-100 mb-2">Meta Description:</label>
                            <textarea name="meta_description" id="meta_description" rows="6" class="form-control">{{ old('meta_description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Card -->
                <div class="card mb-3 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title mb-0">Organization</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="mb-4 col-12">
                            <div class="col-12">
                                <label class="mb-2" for="">Status</label>
                                <select class="selectpicker w-100" name="status">
                                    <option value="1" selected>Published</option>
                                    <option value="2" >Draft</option>
                                    <option value="3" >Pending Review</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 col-12">
                            <label for="category" class="w-100 mb-2">Parent</label>
                            <div class="col-12">
                                <select class="selectpicker " name="parent_id" data-live-search="true" data-container="body">
                                    <option value='0'>None</option>
    
                                </select>
                            </div>
                        </div>
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
                <button type="button" class="btn btn-danger">Cancel</button>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <div class="d-flex gap-3">
                  <button type="button" class="btn btn-light">Save Draft</button>
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
   
@endsection
