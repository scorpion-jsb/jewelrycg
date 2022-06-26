<!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <div class="navbar-nav-wrap">
      <!-- Logo -->
      <a class="navbar-brand" href="/" aria-label="Front">
        <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos/logo.svg') }}" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos-light/logo.svg') }}" alt="Logo" data-hs-theme-appearance="dark">
        <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos/logo-short.svg') }}" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos-light/logo-short.svg') }}" alt="Logo" data-hs-theme-appearance="dark">
      </a>
      <!-- End Logo -->

      <div class="navbar-nav-wrap-content-start">
        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>

        <!-- End Navbar Vertical Toggle -->

        <!-- Search Form -->
        <div class="dropdown ms-2">
          <!-- Input Group -->
          <div class="d-none d-lg-block">
            <div class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
              <div class="input-group-prepend input-group-text">
                <i class="bi-search"></i>
              </div>

              <input type="search" class="js-form-search form-control" placeholder="Search in front" aria-label="Search in front" data-hs-form-search-options='{
                     "clearIcon": "#clearSearchResultsIcon",
                     "dropMenuElement": "#searchDropdownMenu",
                     "dropMenuOffset": 20,
                     "toggleIconOnFocus": true,
                     "activeClass": "focus"
                   }'>
              <a class="input-group-append input-group-text" href="javascript:;">
                <i id="clearSearchResultsIcon" class="bi-x-lg" style="display: none;"></i>
              </a>
            </div>
          </div>

          <button class="js-form-search js-form-search-mobile-toggle btn btn-ghost-secondary btn-icon rounded-circle d-lg-none" type="button" data-hs-form-search-options='{
                     "clearIcon": "#clearSearchResultsIcon",
                     "dropMenuElement": "#searchDropdownMenu",
                     "dropMenuOffset": 20,
                     "toggleIconOnFocus": true,
                     "activeClass": "focus"
                   }'>
            <i class="bi-search"></i>
          </button>
          <!-- End Input Group -->

          <!-- Card Search Content -->
          <div id="searchDropdownMenu" class="hs-form-search-menu-content dropdown-menu dropdown-menu-form-search navbar-dropdown-menu-borderless">
            <!-- Body -->
            <div class="card-body-height">
              <div class="d-lg-none">
                <div class="input-group input-group-merge navbar-input-group mb-5">
                  <div class="input-group-prepend input-group-text">
                    <i class="bi-search"></i>
                  </div>

                  <input type="search" class="form-control" placeholder="Search in front" aria-label="Search in front">
                  <a class="input-group-append input-group-text" href="javascript:;">
                    <i class="bi-x-lg"></i>
                  </a>
                </div>
              </div>

              <span class="dropdown-header">Recent searches</span>

              <div class="dropdown-item bg-transparent text-wrap">
                <a class="btn btn-soft-dark btn-xs rounded-pill" href="../index.html">
                  Gulp <i class="bi-search ms-1"></i>
                </a>
                <a class="btn btn-soft-dark btn-xs rounded-pill" href="../index.html">
                  Notification panel <i class="bi-search ms-1"></i>
                </a>
              </div>

              <div class="dropdown-divider"></div>

              <span class="dropdown-header">Tutorials</span>

              <a class="dropdown-item" href="../index.html">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <span class="icon icon-soft-dark icon-xs icon-circle">
                      <i class="bi-sliders"></i>
                    </span>
                  </div>

                  <div class="flex-grow-1 text-truncate ms-2">
                    <span>How to set up Gulp?</span>
                  </div>
                </div>
              </a>

              <a class="dropdown-item" href="../index.html">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <span class="icon icon-soft-dark icon-xs icon-circle">
                      <i class="bi-paint-bucket"></i>
                    </span>
                  </div>

                  <div class="flex-grow-1 text-truncate ms-2">
                    <span>How to change theme color?</span>
                  </div>
                </div>
              </a>

              <div class="dropdown-divider"></div>

              <span class="dropdown-header">Members</span>

              <a class="dropdown-item" href="../index.html">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <img class="avatar avatar-xs avatar-circle" src="../assets/img/160x160/img10.jpg" alt="Image Description">
                  </div>
                  <div class="flex-grow-1 text-truncate ms-2">
                    <span>Amanda Harvey <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                  </div>
                </div>
              </a>

              <a class="dropdown-item" href="../index.html">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <img class="avatar avatar-xs avatar-circle" src="../assets/img/160x160/img3.jpg" alt="Image Description">
                  </div>
                  <div class="flex-grow-1 text-truncate ms-2">
                    <span>David Harrison</span>
                  </div>
                </div>
              </a>

              <a class="dropdown-item" href="../index.html">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <div class="avatar avatar-xs avatar-soft-info avatar-circle">
                      <span class="avatar-initials">A</span>
                    </div>
                  </div>
                  <div class="flex-grow-1 text-truncate ms-2">
                    <span>Anne Richard</span>
                  </div>
                </div>
              </a>
            </div>
            <!-- End Body -->

            <!-- Footer -->
            <a class="card-footer text-center" href="../index.html">
              See all results <i class="bi-chevron-right small"></i>
            </a>
            <!-- End Footer -->
          </div>
          <!-- End Card Search Content -->

        </div>

        <!-- End Search Form -->
      </div>

      <div class="navbar-nav-wrap-content-end">
        <!-- Navbar -->
        <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            <!-- Notification -->
            <div class="dropdown">
              <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <i class="bi-bell"></i>
                <span class="btn-status btn-sm-status btn-status-danger"></span>
              </button>

              <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                <!-- Header -->
                <div class="card-header card-header-content-between">
                  <h4 class="card-title mb-0">Notifications</h4>

                  <!-- Unfold -->
                  <div class="dropdown">
                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" id="navbarNotificationsDropdownSettings" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi-three-dots-vertical"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdownSettings">
                      <span class="dropdown-header">Settings</span>
                      <a class="dropdown-item" href="#">
                        <i class="bi-archive dropdown-item-icon"></i> Archive all
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="bi-check2-all dropdown-item-icon"></i> Mark all as read
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="bi-toggle-off dropdown-item-icon"></i> Disable notifications
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="bi-gift dropdown-item-icon"></i> What's new?
                      </a>
                      <div class="dropdown-divider"></div>
                      <span class="dropdown-header">Feedback</span>
                      <a class="dropdown-item" href="#">
                        <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                      </a>
                    </div>
                  </div>
                  <!-- End Unfold -->
                </div>
                <!-- End Header -->

                <!-- Nav -->
                <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" href="#notificationNavOne" id="notificationNavOne-tab" data-bs-toggle="tab" data-bs-target="#notificationNavOne" role="tab" aria-controls="notificationNavOne" aria-selected="true">Messages (3)</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#notificationNavTwo" id="notificationNavTwo-tab" data-bs-toggle="tab" data-bs-target="#notificationNavTwo" role="tab" aria-controls="notificationNavTwo" aria-selected="false">Archived</a>
                  </li>
                </ul>
                <!-- End Nav -->

                <!-- Body -->
                <div class="card-body-height">
                  <!-- Tab Content -->
                  <div class="tab-content" id="notificationTabContent">
                    <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                      <!-- List Group -->
                      <ul class="list-group list-group-flush navbar-card-list-group">
                        <!-- Item -->
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                  <label class="form-check-label" for="notificationCheck1"></label>
                                  <span class="form-check-stretched-bg"></span>
                                </div>
                                <img class="avatar avatar-sm avatar-circle" src="../assets/img/160x160/img3.jpg" alt="Image Description">
                              </div>
                            </div>
                            <!-- End Col -->

                            <div class="col ms-n2">
                              <h5 class="mb-1">Brian Warner</h5>
                              <p class="text-body fs-5">changed an issue from "In Progress" to <span class="badge bg-success">Review</span></p>
                            </div>
                            <!-- End Col -->

                            <small class="col-auto text-muted text-cap">2hr</small>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->

                          <a class="stretched-link" href="#"></a>
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck2" checked>
                                  <label class="form-check-label" for="notificationCheck2"></label>
                                  <span class="form-check-stretched-bg"></span>
                                </div>
                                <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                  <span class="avatar-initials">K</span>
                                </div>
                              </div>
                            </div>
                            <!-- End Col -->

                            <div class="col ms-n2">
                              <h5 class="mb-1">Klara Hampton</h5>
                              <p class="text-body fs-5">mentioned you in a comment</p>
                              <blockquote class="blockquote blockquote-sm">
                                Nice work, love! You really nailed it. Keep it up!
                              </blockquote>
                            </div>
                            <!-- End Col -->

                            <small class="col-auto text-muted text-cap">10hr</small>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->

                          <a class="stretched-link" href="#"></a>
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck3" checked>
                                  <label class="form-check-label" for="notificationCheck3"></label>
                                  <span class="form-check-stretched-bg"></span>
                                </div>
                                <div class="avatar avatar-sm avatar-circle">
                                  <img class="avatar-img" src="../assets/img/160x160/img10.jpg" alt="Image Description">
                                </div>
                              </div>
                            </div>
                            <!-- End Col -->

                            <div class="col ms-n2">
                              <h5 class="mb-1">Ruby Walter</h5>
                              <p class="text-body fs-5">joined the Slack group HS Team</p>
                            </div>
                            <!-- End Col -->

                            <small class="col-auto text-muted text-cap">3dy</small>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->

                          <a class="stretched-link" href="#"></a>
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck4">
                                  <label class="form-check-label" for="notificationCheck4"></label>
                                  <span class="form-check-stretched-bg"></span>
                                </div>
                                <div class="avatar avatar-sm avatar-circle">
                                  <img class="avatar-img" src="../assets/svg/brands/google-icon.svg" alt="Image Description">
                                </div>
                              </div>
                            </div>
                            <!-- End Col -->

                            <div class="col ms-n2">
                              <h5 class="mb-1">from Google</h5>
                              <p class="text-body fs-5">Start using forms to capture the information of prospects visiting your Google website</p>
                            </div>
                            <!-- End Col -->

                            <small class="col-auto text-muted text-cap">17dy</small>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->

                          <a class="stretched-link" href="#"></a>
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck5">
                                  <label class="form-check-label" for="notificationCheck5"></label>
                                  <span class="form-check-stretched-bg"></span>
                                </div>
                                <div class="avatar avatar-sm avatar-circle">
                                  <img class="avatar-img" src="../assets/img/160x160/img7.jpg" alt="Image Description">
                                </div>
                              </div>
                            </div>
                            <!-- End Col -->

                            <div class="col ms-n2">
                              <h5 class="mb-1">Sara Villar</h5>
                              <p class="text-body fs-5">completed <i class="bi-journal-bookmark-fill text-primary"></i> FD-7 task</p>
                            </div>
                            <!-- End Col -->

                            <small class="col-auto text-muted text-cap">2mn</small>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->

                          <a class="stretched-link" href="#"></a>
                        </li>
                        <!-- End Item -->
                      </ul>
                      <!-- End List Group -->
                    </div>

                    <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel" aria-labelledby="notificationNavTwo-tab">
                      <!-- List Group -->
                      <ul class="list-group list-group-flush navbar-card-list-group">
                        <!-- Item -->
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck6">
                                  <label class="form-check-label" for="notificationCheck6"></label>
                                  <span class="form-check-stretched-bg"></span>
                                </div>
                                <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                  <span class="avatar-initials">A</span>
                                </div>
                              </div>
                            </div>
                            <!-- End Col -->

                            <div class="col ms-n2">
                              <h5 class="mb-1">Anne Richard</h5>
                              <p class="text-body fs-5">accepted your invitation to join Notion</p>
                            </div>
                            <!-- End Col -->

                            <small class="col-auto text-muted text-cap">1dy</small>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->

                          <a class="stretched-link" href="#"></a>
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck7">
                                  <label class="form-check-label" for="notificationCheck7"></label>
                                  <span class="form-check-stretched-bg"></span>
                                </div>
                                <div class="avatar avatar-sm avatar-circle">
                                  <img class="avatar-img" src="../assets/img/160x160/img5.jpg" alt="Image Description">
                                </div>
                              </div>
                            </div>
                            <!-- End Col -->

                            <div class="col ms-n2">
                              <h5 class="mb-1">Finch Hoot</h5>
                              <p class="text-body fs-5">left Slack group HS projects</p>
                            </div>
                            <!-- End Col -->

                            <small class="col-auto text-muted text-cap">1dy</small>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->

                          <a class="stretched-link" href="#"></a>
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck8">
                                  <label class="form-check-label" for="notificationCheck8"></label>
                                  <span class="form-check-stretched-bg"></span>
                                </div>
                                <div class="avatar avatar-sm avatar-dark avatar-circle">
                                  <span class="avatar-initials">HS</span>
                                </div>
                              </div>
                            </div>
                            <!-- End Col -->

                            <div class="col ms-n2">
                              <h5 class="mb-1">Htmlstream</h5>
                              <p class="text-body fs-5">you earned a "Top endorsed" <i class="bi-patch-check-fill text-primary"></i> badge</p>
                            </div>
                            <!-- End Col -->

                            <small class="col-auto text-muted text-cap">6dy</small>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->

                          <a class="stretched-link" href="#"></a>
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck9">
                                  <label class="form-check-label" for="notificationCheck9"></label>
                                  <span class="form-check-stretched-bg"></span>
                                </div>
                                <div class="avatar avatar-sm avatar-circle">
                                  <img class="avatar-img" src="../assets/img/160x160/img8.jpg" alt="Image Description">
                                </div>
                              </div>
                            </div>
                            <!-- End Col -->

                            <div class="col ms-n2">
                              <h5 class="mb-1">Linda Bates</h5>
                              <p class="text-body fs-5">Accepted your connection</p>
                            </div>
                            <!-- End Col -->

                            <small class="col-auto text-muted text-cap">17dy</small>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->

                          <a class="stretched-link" href="#"></a>
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck10">
                                  <label class="form-check-label" for="notificationCheck10"></label>
                                  <span class="form-check-stretched-bg"></span>
                                </div>
                                <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                  <span class="avatar-initials">L</span>
                                </div>
                              </div>
                            </div>
                            <!-- End Col -->

                            <div class="col ms-n2">
                              <h5 class="mb-1">Lewis Clarke</h5>
                              <p class="text-body fs-5">completed <i class="bi-journal-bookmark-fill text-primary"></i> FD-134 task</p>
                            </div>
                            <!-- End Col -->

                            <small class="col-auto text-muted text-cap">2mts</small>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->

                          <a class="stretched-link" href="#"></a>
                        </li>
                        <!-- End Item -->
                      </ul>
                      <!-- End List Group -->
                    </div>
                  </div>
                  <!-- End Tab Content -->
                </div>
                <!-- End Body -->

                <!-- Card Footer -->
                <a class="card-footer text-center" href="#">
                  View all notifications <i class="bi-chevron-right"></i>
                </a>
                <!-- End Card Footer -->
              </div>
            </div>
            <!-- End Notification -->
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <!-- Apps -->
            <div class="dropdown">
              <button type="button" class="btn btn-icon btn-ghost-secondary rounded-circle" id="navbarAppsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                <i class="bi-app-indicator"></i>
              </button>

              <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarAppsDropdown" style="width: 25rem;">
                <!-- Header -->
                <div class="card-header">
                  <h4 class="card-title">Web apps &amp; services</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body card-body-height">
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img class="avatar avatar-xs avatar-4x3" src="../assets/svg/brands/atlassian-icon.svg" alt="Image Description">
                      </div>
                      <div class="flex-grow-1 text-truncate ms-3">
                        <h5 class="mb-0">Atlassian</h5>
                        <p class="card-text text-body">Security and control across Cloud</p>
                      </div>
                    </div>
                  </a>

                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img class="avatar avatar-xs avatar-4x3" src="../assets/svg/brands/slack-icon.svg" alt="Image Description">
                      </div>
                      <div class="flex-grow-1 text-truncate ms-3">
                        <h5 class="mb-0">Slack <span class="badge bg-primary rounded-pill text-uppercase ms-1">Try</span></h5>
                        <p class="card-text text-body">Email collaboration software</p>
                      </div>
                    </div>
                  </a>

                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img class="avatar avatar-xs avatar-4x3" src="../assets/svg/brands/google-webdev-icon.svg" alt="Image Description">
                      </div>
                      <div class="flex-grow-1 text-truncate ms-3">
                        <h5 class="mb-0">Google webdev</h5>
                        <p class="card-text text-body">Work involved in developing a website</p>
                      </div>
                    </div>
                  </a>

                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img class="avatar avatar-xs avatar-4x3" src="../assets/svg/brands/frontapp-icon.svg" alt="Image Description">
                      </div>
                      <div class="flex-grow-1 text-truncate ms-3">
                        <h5 class="mb-0">Frontapp</h5>
                        <p class="card-text text-body">The inbox for teams</p>
                      </div>
                    </div>
                  </a>

                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img class="avatar avatar-xs avatar-4x3" src="../assets/svg/illustrations/review-rating-shield.svg" alt="Image Description">
                      </div>
                      <div class="flex-grow-1 text-truncate ms-3">
                        <h5 class="mb-0">HS Support</h5>
                        <p class="card-text text-body">Customer service and support</p>
                      </div>
                    </div>
                  </a>

                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm avatar-soft-dark">
                          <span class="avatar-initials"><i class="bi-grid"></i></span>
                        </div>
                      </div>
                      <div class="flex-grow-1 text-truncate ms-3">
                        <h5 class="mb-0">More Front products</h5>
                        <p class="card-text text-body">Check out more HS products</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <a class="card-footer text-center" href="#">
                  View all apps <i class="bi-chevron-right"></i>
                </a>
                <!-- End Footer -->
              </div>
            </div>
            <!-- End Apps -->
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <!-- Activity -->
            <button class="btn btn-ghost-secondary btn-icon rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasActivityStream" aria-controls="offcanvasActivityStream">
              <i class="bi-x-diamond"></i>
            </button>
            <!-- Activity -->
          </li>

          <li class="nav-item">
            <!-- Account -->
            <div class="dropdown">
              <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <div class="avatar avatar-sm avatar-circle">
                  <img class="avatar-img" src="../assets/img/160x160/img6.jpg" alt="Image Description">
                  <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                </div>
              </a>

              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                <div class="dropdown-item-text">
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm avatar-circle">
                      <img class="avatar-img" src="../assets/img/160x160/img6.jpg" alt="Image Description">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-0">Mark Williams</h5>
                      <p class="card-text text-body">mark@site.com</p>
                    </div>
                  </div>
                </div>

                <div class="dropdown-divider"></div>

                <!-- Dropdown -->
                <div class="dropdown">
                  <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle" href="javascript:;" id="navSubmenuPagesAccountDropdown1" data-bs-toggle="dropdown" aria-expanded="false">Set status</a>

                  <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu" aria-labelledby="navSubmenuPagesAccountDropdown1">
                    <a class="dropdown-item" href="#">
                      <span class="legend-indicator bg-success me-1"></span> Available
                    </a>
                    <a class="dropdown-item" href="#">
                      <span class="legend-indicator bg-danger me-1"></span> Busy
                    </a>
                    <a class="dropdown-item" href="#">
                      <span class="legend-indicator bg-warning me-1"></span> Away
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Reset status
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->

                <a class="dropdown-item" href="#">Profile &amp; account</a>
                <a class="dropdown-item" href="#">Settings</a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <div class="avatar avatar-sm avatar-dark avatar-circle">
                        <span class="avatar-initials">HS</span>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-2">
                      <h5 class="mb-0">Htmlstream <span class="badge bg-primary rounded-pill text-uppercase ms-1">PRO</span></h5>
                      <span class="card-text">hs.example.com</span>
                    </div>
                  </div>
                </a>

                <div class="dropdown-divider"></div>

                <!-- Dropdown -->
                <div class="dropdown">
                  <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle" href="javascript:;" id="navSubmenuPagesAccountDropdown2" data-bs-toggle="dropdown" aria-expanded="false">Customization</a>

                  <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu" aria-labelledby="navSubmenuPagesAccountDropdown2">
                    <a class="dropdown-item" href="#">
                      Invite people
                    </a>
                    <a class="dropdown-item" href="#">
                      Analytics
                      <i class="bi-box-arrow-in-up-right"></i>
                    </a>
                    <a class="dropdown-item" href="#">
                      Customize Front
                      <i class="bi-box-arrow-in-up-right"></i>
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->

                <a class="dropdown-item" href="#">Manage team</a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">Sign out</a>
              </div>
            </div>
            <!-- End Account -->
          </li>
        </ul>
        <!-- End Navbar -->
      </div>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->
