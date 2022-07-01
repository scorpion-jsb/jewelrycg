@extends('backend.layouts.app', ['activePage' => 'products', 'title' => 'Products Attributes', 'navName' => 'attributes', 'activeButton' => 'products'])

@section('content')
 <!-- Content -->
 <div class="content @@layoutBuilder.header.containerMode">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-sm mb-2 mb-sm-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-no-gutter">
              <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Project</a></li>
              <li class="breadcrumb-item active" aria-current="page">File manager</li>
            </ol>
          </nav>

          <h1 class="page-header-title">Files</h1>
        </div>
        <!-- End Col -->

        <div class="col-sm-auto" aria-label="Button group">
          <!-- Button Group -->
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadFilesModal">
              <i class="bi-cloud-arrow-up-fill me-1"></i> Upload
            </button>

            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" id="uploadGroupDropdown" data-bs-toggle="dropdown" aria-expanded="false"></button>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="uploadGroupDropdown">
                <a class="dropdown-item" href="#">
                  <i class="bi-folder-plus dropdown-item-icon"></i> New folder
                </a>
                <a class="dropdown-item" href="#">
                  <i class="bi-folder-symlink dropdown-item-icon"></i> New shared folder
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#uploadFilesModal">
                  <i class="bi-file-earmark-arrow-up dropdown-item-icon"></i> Upload files
                </a>
                <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#uploadFilesModal">
                  <i class="bi-upload dropdown-item-icon"></i> Upload folder
                </a>
              </div>
            </div>
          </div>
          <!-- End Button Group -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Page Header -->

   

   

    

    <!-- Tab Content -->
    <div class="tab-content" id="connectionsTabContent">
    
      <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
        <!-- Folders -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
            @foreach($all_uploads as $file)
            <div class="col mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
              <div class="card-header card-header-content-between border-0">
                <span class="small">{{$file->file_size}}kb</span>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="filesGridDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesGridDropdown1" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-share dropdown-item-icon"></i> Share file
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-folder-plus dropdown-item-icon"></i> Move to
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-star dropdown-item-icon"></i> Add to stared
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-download dropdown-item-icon"></i> Download
                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>

              <div class="card-body">
                <img class="avatar avatar-4x3" src="{{ url('uploads/all')}}/{{ $file->file_name}}" alt="Image Description">
              </div>

              <div class="card-body">
                <h5 class="card-title">{{ $file->file_original_name}}</h5>
                <p class="small">Updated {{ $file->created_at->diffForHumans()}}</p>
              </div>

              <a class="stretched-link" href="#"></a>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Col -->
          @endforeach
        </div>
        <!-- End Folders -->
      </div>
   
    </div>
    <!-- End Tab Content -->
  </div>
  <!-- End Content -->

   <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== SECONDARY CONTENTS ========== -->
  <!-- Keyboard Shortcuts -->

  <!-- Upload files Modal -->
  @include("backend.filemanager.partials.modals.upload-files")
  <!-- End Upload files Modal -->
  <!-- ========== END SECONDARY CONTENTS ========== -->

  @endsection

  @section('js_content')
    <script>
        $('#browse').on('click', function(){
            $('#prepare_images').trigger('click')
        })
    </script>
  @endsection