<div class="modal fade" id="CallFilesModal" tabindex="-1" aria-labelledby="uploadFilesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadFilesModalLabel">Select File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Body -->
            <div class="modal-body">
                <div class="tab-content" id="connectionsTabContent">
    
                    <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                      <!-- Folders -->
                      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
                          @foreach($files as $file)
                          <div class="col mb-3 mb-lg-5"  onclick="
                          @if(!$is_product)
                            return selectFileFromManager({{$file->id}}, '{{ url('uploads/all')}}/{{ $file->file_name}}')
                          @else
                          return selectFileFromManagerMultiple({{$file->id}}, '{{ url('uploads/all')}}/{{ $file->file_name}}')
                            
                          @endif
                          ">
                          <!-- Card -->
                          <div  id="file-{{$file->id}}" class="card card-sm card-hover-shadow card-header-borderless h-100 text-center 
                            @if(isset($selected) && in_array($file->id, $selected))
                              selected
                            @endif
                            ">
                            <div class="card-header card-header-content-between border-0">
                              <span class="small">{{$file->file_size}}kb</span>
                              <!-- Dropdown -->
                              <div class="dropdown">
                                @if($is_product)
                                <button type="button" 
                                @if(isset($selected) && !in_array($file->id, $selected))
                                style="display: none"
                                @endif
                                 class="btn btn-ghost-secondary bg-info text-white btn-icon btn-sm card-dropdown-btn check-this rounded-circle">
                                  <i class="bi-check"></i>
                                </button>
                                
                                @endif
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
                              <img class="avatar-xxl" src="{{ url('uploads/all')}}/{{ $file->file_name}}" alt="Image Description">
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
            </div>
        </div>
    </div>
</div>