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

    <h2 class="h4 mb-3">Pinned access <i class="bi-question-circle text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Pinned access to files you've been working on."></i></h2>

    <!-- Pinned Access -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mb-5">
      <div class="col mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-sm card-hover-shadow h-100 text-center">
          <!-- Form Check -->
          <div class="form-check form-check-switch card-pinned-top-start zi-2">
            <input class="form-check-input" type="checkbox" value="" id="starredCheckbox1" checked>
            <label class="form-check-label btn-icon btn-xs rounded-circle" for="starredCheckbox1">
              <span class="form-check-default" data-bs-toggle="tooltip" data-bs-placement="top" title="Pin">
                <i class="bi-star"></i>
              </span>
              <span class="form-check-active" data-bs-toggle="tooltip" data-bs-placement="top" title="Pinned">
                <i class="bi-star-fill"></i>
              </span>
            </label>
          </div>
          <!-- End Form Check -->

          <!-- Dropdown -->
          <div class="dropdown card-pinned-top-end">
            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="pinnedAccessDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi-three-dots-vertical"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="pinnedAccessDropdown1" style="min-width: 13rem;">
              <span class="dropdown-header">Settings</span>

              <a class="dropdown-item" href="#">
                <i class="bi-share dropdown-item-icon"></i> Share folder
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

          <img class="card-img-top" src="@@autopath/assets/img/600x200/img2.jpg" alt="Image Description">

          <div class="card-footer border-0">
            <span class="d-block fs-6 text-muted mb-1">1 files</span>
            <h5>Screenshots from Figma</h5>
          </div>

          <a class="stretched-link" href="#"></a>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Col -->

      <div class="col mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-sm card-hover-shadow h-100 text-center">
          <!-- Form Check -->
          <div class="form-check form-check-switch card-pinned-top-start zi-2">
            <input class="form-check-input" type="checkbox" value="" id="starredCheckbox2" checked>
            <label class="form-check-label btn-icon btn-xs rounded-circle" for="starredCheckbox2">
              <span class="form-check-default" data-bs-toggle="tooltip" data-bs-placement="top" title="Pin">
                <i class="bi-star"></i>
              </span>
              <span class="form-check-active" data-bs-toggle="tooltip" data-bs-placement="top" title="Pinned">
                <i class="bi-star-fill"></i>
              </span>
            </label>
          </div>
          <!-- End Form Check -->

          <!-- Dropdown -->
          <div class="dropdown card-pinned-top-end">
            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="pinnedAccessDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi-three-dots-vertical"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="pinnedAccessDropdown2" style="min-width: 13rem;">
              <span class="dropdown-header">Settings</span>

              <a class="dropdown-item" href="#">
                <i class="bi-share dropdown-item-icon"></i> Share folder
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

          <div class="card-body">
            <img class="avatar avatar-4x3" src="@@autopath/assets/svg/brands/google-sheets-icon.svg" alt="Image Description">
          </div>

          <div class="card-footer border-0">
            <span class="d-block fs-6 text-muted mb-1">0 files</span>
            <h5>Early audit sheets for last year</h5>
          </div>

          <a class="stretched-link" href="#"></a>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Col -->

      <div class="col mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-sm card-hover-shadow h-100 text-center">
          <!-- Form Check -->
          <div class="form-check form-check-switch card-pinned-top-start zi-2">
            <input class="form-check-input" type="checkbox" value="" id="starredCheckbox3" checked>
            <label class="form-check-label btn-icon btn-xs rounded-circle" for="starredCheckbox3">
              <span class="form-check-default" data-bs-toggle="tooltip" data-bs-placement="top" title="Pin">
                <i class="bi-star"></i>
              </span>
              <span class="form-check-active" data-bs-toggle="tooltip" data-bs-placement="top" title="Pinned">
                <i class="bi-star-fill"></i>
              </span>
            </label>
          </div>
          <!-- End Form Check -->

          <!-- Dropdown -->
          <div class="dropdown card-pinned-top-end">
            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="pinnedAccessDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi-three-dots-vertical"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="pinnedAccessDropdown3" style="min-width: 13rem;">
              <span class="dropdown-header">Settings</span>

              <a class="dropdown-item" href="#">
                <i class="bi-share dropdown-item-icon"></i> Share folder
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

          <div class="card-body">
            <img class="avatar avatar-4x3" src="@@autopath/assets/svg/components/placeholder-img-format.svg" alt="Image Description">
          </div>

          <div class="card-footer border-0">
            <span class="d-block fs-6 text-muted mb-1">27 files</span>
            <h5>Article images</h5>
          </div>

          <a class="stretched-link" href="#"></a>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Col -->

      <div class="col mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-sm card-hover-shadow h-100 text-center">
          <!-- Form Check -->
          <div class="form-check form-check-switch card-pinned-top-start zi-2">
            <input class="form-check-input" type="checkbox" value="" id="starredCheckbox4" checked>
            <label class="form-check-label btn-icon btn-xs rounded-circle" for="starredCheckbox4">
              <span class="form-check-default" data-bs-toggle="tooltip" data-bs-placement="top" title="Pin">
                <i class="bi-star"></i>
              </span>
              <span class="form-check-active" data-bs-toggle="tooltip" data-bs-placement="top" title="Pinned">
                <i class="bi-star-fill"></i>
              </span>
            </label>
          </div>
          <!-- End Form Check -->

          <!-- Dropdown -->
          <div class="dropdown card-pinned-top-end">
            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="pinnedAccessDropdown4" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi-three-dots-vertical"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="pinnedAccessDropdown4" style="min-width: 13rem;">
              <span class="dropdown-header">Settings</span>

              <a class="dropdown-item" href="#">
                <i class="bi-share dropdown-item-icon"></i> Share folder
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

          <div class="card-body">
            <img class="avatar avatar-4x3" src="@@autopath/assets/svg/brands/google-slides-icon.svg" alt="Image Description">
          </div>

          <div class="card-footer border-0">
            <span class="d-block fs-6 text-muted mb-1">8 files</span>
            <h5>Solving product design exercises</h5>
          </div>

          <a class="stretched-link" href="#"></a>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Pinned Access -->

    <h2 class="h4 mb-3">Folders</h2>

    <!-- Folders -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mb-5">
      <div class="col mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-sm card-hover-shadow h-100">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <i class="bi-folder-plus fs-2 text-body me-2"></i>

              <h5 class="text-truncate ms-2 mb-0">Premium images</h5>

              <!-- Dropdown -->
              <div class="dropdown ms-auto">
                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi-three-dots-vertical"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown1" style="min-width: 13rem;">
                  <span class="dropdown-header">Settings</span>

                  <a class="dropdown-item" href="#">
                    <i class="bi-share dropdown-item-icon"></i> Share folder
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
          </div>
          <a class="stretched-link" href="#"></a>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Col -->

      <div class="col mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-sm card-hover-shadow h-100">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <i class="bi-folder fs-2 text-body me-2"></i>

              <h5 class="text-truncate ms-2 mb-0">Front materials</h5>

              <!-- Dropdown -->
              <div class="dropdown ms-auto">
                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi-three-dots-vertical"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown2" style="min-width: 13rem;">
                  <span class="dropdown-header">Settings</span>

                  <a class="dropdown-item" href="#">
                    <i class="bi-share dropdown-item-icon"></i> Share folder
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
          </div>
          <a class="stretched-link" href="#"></a>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Col -->

      <div class="col mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-sm card-hover-shadow h-100">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <i class="bi-folder fs-2 text-body me-2"></i>

              <h5 class="text-truncate ms-2 mb-0">Illustrations</h5>

              <!-- Dropdown -->
              <div class="dropdown ms-auto">
                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi-three-dots-vertical"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown3" style="min-width: 13rem;">
                  <span class="dropdown-header">Settings</span>

                  <a class="dropdown-item" href="#">
                    <i class="bi-share dropdown-item-icon"></i> Share folder
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
          </div>
          <a class="stretched-link" href="#"></a>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Folders -->

    <!-- Header -->
    <div class="row align-items-center mb-2">
      <div class="col">
        <h2 class="h4 mb-0">Files</h2>
      </div>

      <div class="col-auto">
        <!-- Nav -->
        <ul class="nav nav-segment" id="connectionsTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="grid-tab" data-bs-toggle="tab" href="#grid" role="tab" aria-controls="grid" aria-selected="true" title="Column view">
              <i class="bi-grid"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="list-tab" data-bs-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false" title="List view">
              <i class="bi-view-list"></i>
            </a>
          </li>
        </ul>
        <!-- End Nav -->
      </div>
    </div>
    <!-- End Header -->

    <!-- Tab Content -->
    <div class="tab-content" id="connectionsTabContent">
      <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
        <!-- Folders -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
          <div class="col mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
              <div class="card-header card-header-content-between border-0">
                <span class="small">25kb</span>

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
                <img class="avatar avatar-4x3" src="@@autopath/assets/svg/brands/google-docs-icon.svg" alt="Image Description">
              </div>

              <div class="card-body">
                <h5 class="card-title">WordPress contract terms</h5>
                <p class="small">Updated 50 min ago</p>
              </div>

              <a class="stretched-link" href="#"></a>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Col -->

          <div class="col mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
              <div class="card-header card-header-content-between border-0">
                <span class="small">1mb</span>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="filesGridDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesGridDropdown2" style="min-width: 13rem;">
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
                <img class="avatar avatar-4x3" src="@@autopath/assets/svg/brands/pdf-icon.svg" alt="Image Description">
              </div>

              <div class="card-body">
                <h5 class="card-title">Dashboard layout flow</h5>
                <p class="small">Updated 1 hour ago</p>
              </div>

              <a class="stretched-link" href="#"></a>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Col -->

          <div class="col mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
              <div class="card-header card-header-content-between border-0">
                <span class="small">3mb</span>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="filesGridDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesGridDropdown3" style="min-width: 13rem;">
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
                <img class="avatar avatar-4x3" src="@@autopath/assets/svg/brands/google-slides-icon.svg" alt="Image Description">
              </div>

              <div class="card-body">
                <h5 class="card-title">WordPress theme presentation</h5>
                <p class="small">Updated 5 hours ago</p>
              </div>

              <a class="stretched-link" href="#"></a>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Col -->

          <div class="col mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
              <div class="card-header card-header-content-between border-0">
                <span class="small">1mb</span>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="filesGridDropdown4" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesGridDropdown4" style="min-width: 13rem;">
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
                <img class="avatar avatar-4x3" src="@@autopath/assets/svg/brands/google-docs-icon.svg" alt="Image Description">
              </div>

              <div class="card-body">
                <h5 class="card-title">Untitled</h5>
                <p class="small">Updated 5 hours ago</p>
              </div>

              <a class="stretched-link" href="#"></a>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Col -->

          <div class="col mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
              <div class="card-header card-header-content-between border-0">
                <span class="small">3mb</span>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="filesGridDropdown5" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesGridDropdown5" style="min-width: 13rem;">
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
                <img class="avatar avatar-4x3" src="@@autopath/assets/svg/brands/google-sheets-icon.svg" alt="Image Description">
              </div>

              <div class="card-body">
                <h5 class="card-title">Hot startups 2019 - Report</h5>
                <p class="small">Updated 3 weeks ago</p>
              </div>

              <a class="stretched-link" href="#"></a>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Col -->

          <div class="col mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
              <div class="card-header card-header-content-between border-0">
                <span class="small">2mb</span>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="filesGridDropdown6" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesGridDropdown6" style="min-width: 13rem;">
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
                <img class="avatar avatar-4x3" src="@@autopath/assets/svg/brands/google-docs-icon.svg" alt="Image Description">
              </div>

              <div class="card-body">
                <h5 class="card-title">Marketing strategy</h5>
                <p class="small">Updated 2 weeks ago</p>
              </div>

              <a class="stretched-link" href="#"></a>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Col -->

          <div class="col mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
              <div class="card-header card-header-content-between border-0">
                <span class="small">15mb</span>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="filesGridDropdown7" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesGridDropdown7" style="min-width: 13rem;">
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
                <img class="avatar avatar-4x3" src="@@autopath/assets/svg/components/placeholder-img-format.svg" alt="Image Description">
              </div>

              <div class="card-body">
                <h5 class="card-title">Past-experiences.jpg</h5>
                <p class="small">Updated 1 month ago</p>
              </div>

              <a class="stretched-link" href="#"></a>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Col -->

          <div class="col mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
              <div class="card-header card-header-content-between border-0">
                <span class="small">9mb</span>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="filesGridDropdown8" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesGridDropdown8" style="min-width: 13rem;">
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
                <img class="avatar avatar-4x3" src="@@autopath/assets/svg/components/placeholder-img-format.svg" alt="Image Description">
              </div>

              <div class="card-body">
                <h5 class="card-title">Front_2018.jpg</h5>
                <p class="small">Updated 1 month ago</p>
              </div>

              <a class="stretched-link" href="#"></a>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Col -->

          <div class="col mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
              <div class="card-header card-header-content-between border-0">
                <span class="small">4mb</span>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="filesGridDropdown9" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesGridDropdown9" style="min-width: 13rem;">
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
                <img class="avatar avatar-4x3" src="@@autopath/assets/svg/brands/pdf-icon.svg" alt="Image Description">
              </div>

              <div class="card-body">
                <h5 class="card-title">Business opportunities</h5>
                <p class="small">Updated 2 months ago</p>
              </div>

              <a class="stretched-link" href="#"></a>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Folders -->
      </div>

      <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
        <ul class="list-group">
          <!-- List Item -->
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-auto">
                <img class="avatar avatar-xs avatar-4x3" src="@@autopath/assets/svg/brands/google-docs-icon.svg" alt="Image Description">
              </div>
              <!-- End Col -->

              <div class="col">
                <h5 class="mb-0">
                  <a class="text-dark" href="#">WordPress contract terms</a>
                </h5>
                <ul class="list-inline list-separator small text-body">
                  <li class="list-inline-item">Updated 50 min ago</li>
                  <li class="list-inline-item">25kb</li>
                </ul>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-white btn-sm" id="filesListDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-sm-inline-block me-1">More</span>
                    <i class="bi-chevron-down"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesListDropdown1" style="min-width: 13rem;">
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
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </li>
          <!-- End List Item -->

          <!-- List Item -->
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-auto">
                <img class="avatar avatar-xs avatar-4x3" src="@@autopath/assets/svg/brands/pdf-icon.svg" alt="Image Description">
              </div>
              <!-- End Col -->

              <div class="col">
                <h5 class="mb-0">
                  <a class="text-dark" href="#">Dashboard layout flow</a>
                </h5>
                <ul class="list-inline list-separator small text-body">
                  <li class="list-inline-item">Updated 1 hour ago</li>
                  <li class="list-inline-item">1mb</li>
                </ul>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-white btn-sm" id="filesListDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-sm-inline-block me-1">More</span>
                    <i class="bi-chevron-down"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
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
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </li>
          <!-- End List Item -->

          <!-- List Item -->
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-auto">
                <img class="avatar avatar-xs avatar-4x3" src="@@autopath/assets/svg/brands/google-slides-icon.svg" alt="Image Description">
              </div>
              <!-- End Col -->

              <div class="col">
                <h5 class="mb-0">
                  <a class="text-dark" href="#">WordPress theme presentation</a>
                </h5>
                <ul class="list-inline list-separator small text-body">
                  <li class="list-inline-item">Updated 5 hours ago</li>
                  <li class="list-inline-item">3mb</li>
                </ul>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-white btn-sm" id="filesListDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-sm-inline-block me-1">More</span>
                    <i class="bi-chevron-down"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesListDropdown3" style="min-width: 13rem;">
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
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </li>
          <!-- End List Item -->

          <!-- List Item -->
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-auto">
                <img class="avatar avatar-xs avatar-4x3" src="@@autopath/assets/svg/brands/google-docs-icon.svg" alt="Image Description">
              </div>
              <!-- End Col -->

              <div class="col">
                <h5 class="mb-0">
                  <a class="text-dark" href="#">Untitled</a>
                </h5>
                <ul class="list-inline list-separator small text-body">
                  <li class="list-inline-item">Updated 5 hours ago</li>
                  <li class="list-inline-item">1mb</li>
                </ul>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-white btn-sm" id="filesListDropdown4" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-sm-inline-block me-1">More</span>
                    <i class="bi-chevron-down"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesListDropdown4" style="min-width: 13rem;">
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
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </li>
          <!-- End List Item -->

          <!-- List Item -->
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-auto">
                <img class="avatar avatar-xs avatar-4x3" src="@@autopath/assets/svg/brands/google-sheets-icon.svg" alt="Image Description">
              </div>
              <!-- End Col -->

              <div class="col">
                <h5 class="mb-0">
                  <a class="text-dark" href="#">Hot startup 2019 - Report</a>
                </h5>
                <ul class="list-inline list-separator small text-body">
                  <li class="list-inline-item">Updated 3 weeks ago</li>
                  <li class="list-inline-item">3mb</li>
                </ul>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-white btn-sm" id="filesListDropdown5" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-sm-inline-block me-1">More</span>
                    <i class="bi-chevron-down"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesListDropdown5" style="min-width: 13rem;">
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
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </li>
          <!-- End List Item -->

          <!-- List Item -->
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-auto">
                <img class="avatar avatar-xs avatar-4x3" src="@@autopath/assets/svg/brands/google-docs-icon.svg" alt="Image Description">
              </div>
              <!-- End Col -->

              <div class="col">
                <h5 class="mb-0">
                  <a class="text-dark" href="#">Marketing strategy</a>
                </h5>
                <ul class="list-inline list-separator small text-body">
                  <li class="list-inline-item">Updated 2 weeks ago</li>
                  <li class="list-inline-item">2mb</li>
                </ul>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-white btn-sm" id="filesListDropdown6" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-sm-inline-block me-1">More</span>
                    <i class="bi-chevron-down"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesListDropdown6" style="min-width: 13rem;">
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
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </li>
          <!-- End List Item -->

          <!-- List Item -->
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-auto">
                <img class="avatar avatar-xs avatar-4x3" src="@@autopath/assets/svg/components/placeholder-img-format.svg" alt="Image Description">
              </div>
              <!-- End Col -->

              <div class="col">
                <h5 class="mb-0">
                  <a class="text-dark" href="#">Past-experience.jpg</a>
                </h5>
                <ul class="list-inline list-separator small text-body">
                  <li class="list-inline-item">Updated 1 month ago</li>
                  <li class="list-inline-item">15mb</li>
                </ul>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-white btn-sm" id="filesListDropdown7" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-sm-inline-block me-1">More</span>
                    <i class="bi-chevron-down"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesListDropdown7" style="min-width: 13rem;">
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
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </li>
          <!-- End List Item -->

          <!-- List Item -->
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-auto">
                <img class="avatar avatar-xs avatar-4x3" src="@@autopath/assets/svg/components/placeholder-img-format.svg" alt="Image Description">
              </div>
              <!-- End Col -->

              <div class="col">
                <h5 class="mb-0">
                  <a class="text-dark" href="#">Front_2018.jpg</a>
                </h5>
                <ul class="list-inline list-separator small text-body">
                  <li class="list-inline-item">Updated 1 month ago</li>
                  <li class="list-inline-item">9mb</li>
                </ul>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-white btn-sm" id="filesListDropdown8" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-sm-inline-block me-1">More</span>
                    <i class="bi-chevron-down"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesListDropdown8" style="min-width: 13rem;">
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
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </li>
          <!-- End List Item -->

          <!-- List Item -->
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-auto">
                <img class="avatar avatar-xs avatar-4x3" src="@@autopath/assets/svg/brands/pdf-icon.svg" alt="Image Description">
              </div>
              <!-- End Col -->

              <div class="col">
                <h5 class="mb-0">
                  <a class="text-dark" href="#">Business opportunities</a>
                </h5>
                <ul class="list-inline list-separator small text-body">
                  <li class="list-inline-item">Updated 2 months ago</li>
                  <li class="list-inline-item">4mb</li>
                </ul>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                  <button type="button" class="btn btn-white btn-sm" id="filesListDropdown9" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-sm-inline-block me-1">More</span>
                    <i class="bi-chevron-down"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesListDropdown9" style="min-width: 13rem;">
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
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </li>
          <!-- End List Item -->
        </ul>
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