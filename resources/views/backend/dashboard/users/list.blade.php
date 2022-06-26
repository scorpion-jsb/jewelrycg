@extends('backend.dashboard.layouts.app', ['activePage' => 'users', 'title' => 'All Users', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-sm mb-2 mb-sm-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-no-gutter">
            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav>

        <h1 class="page-header-title">Users</h1>
        </div>
        <!-- End Col -->

    </div>
    <!-- End Row -->
</div>
<!-- End Page Header -->

<!-- Stats -->
<div class="row">
    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
        <div class="card-body">
            <h6 class="card-subtitle mb-2">Total users</h6>

            <div class="row align-items-center gx-2">
            <div class="col">
                <span class="js-counter display-4 text-dark">24</span>
                <span class="text-body fs-5 ms-1">from 22</span>
            </div>
            <!-- End Col -->

            <div class="col-auto">
                <span class="badge bg-soft-success text-success p-1">
                <i class="bi-graph-up"></i> 5.0%
                </span>
            </div>
            <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
        <div class="card-body">
            <h6 class="card-subtitle mb-2">Active members</h6>

            <div class="row align-items-center gx-2">
            <div class="col">
                <span class="js-counter display-4 text-dark">12</span>
                <span class="text-body fs-5 ms-1">from 11</span>
            </div>

            <div class="col-auto">
                <span class="badge bg-soft-success text-success p-1">
                <i class="bi-graph-up"></i> 1.2%
                </span>
            </div>
            </div>
            <!-- End Row -->
        </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
        <div class="card-body">
            <h6 class="card-subtitle mb-2">New/returning</h6>

            <div class="row align-items-center gx-2">
            <div class="col">
                <span class="js-counter display-4 text-dark">56</span>
                <span class="display-4 text-dark">%</span>
                <span class="text-body fs-5 ms-1">from 48.7</span>
            </div>

            <div class="col-auto">
                <span class="badge bg-soft-danger text-danger p-1">
                <i class="bi-graph-down"></i> 2.8%
                </span>
            </div>
            </div>
            <!-- End Row -->
        </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
        <div class="card-body">
            <h6 class="card-subtitle mb-2">Active members</h6>

            <div class="row align-items-center gx-2">
            <div class="col">
                <span class="js-counter display-4 text-dark">28.6</span>
                <span class="display-4 text-dark">%</span>
                <span class="text-body fs-5 ms-1">from 28.6%</span>
            </div>

            <div class="col-auto">
                <span class="badge bg-soft-secondary text-secondary p-1">0.0%</span>
            </div>
            </div>
            <!-- End Row -->
        </div>
        </div>
        <!-- End Card -->
    </div>
</div>
<!-- End Stats -->

<!-- Card -->
<div class="card">
  <div class="card-header card-header-content-md-between">
    <div class="mb-2 mb-md-0">

    </div>
  </div>
  <div class="table-responsive datatable-custom position-relative">
          <div id="datatable_wrapper" class="dataTables_wrapper no-footer"><div class="dt-buttons">          <button class="dt-button buttons-copy buttons-html5 d-none" tabindex="0" aria-controls="datatable" type="button"><span>Copy</span></button> <button class="dt-button buttons-excel buttons-html5 d-none" tabindex="0" aria-controls="datatable" type="button"><span>Excel</span></button> <button class="dt-button buttons-csv buttons-html5 d-none" tabindex="0" aria-controls="datatable" type="button"><span>CSV</span></button> <button class="dt-button buttons-pdf buttons-html5 d-none" tabindex="0" aria-controls="datatable" type="button"><span>PDF</span></button> <button class="dt-button buttons-print d-none" tabindex="0" aria-controls="datatable" type="button"><span>Print</span></button> </div><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="datatable"></label></div><table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer" data-hs-datatables-options="{
                   &quot;columnDefs&quot;: [{
                      &quot;targets&quot;: [0, 7],
                      &quot;orderable&quot;: false
                    }],
                   &quot;order&quot;: [],
                   &quot;info&quot;: {
                     &quot;totalQty&quot;: &quot;#datatableWithPaginationInfoTotalQty&quot;
                   },
                   &quot;search&quot;: &quot;#datatableSearch&quot;,
                   &quot;entries&quot;: &quot;#datatableEntries&quot;,
                   &quot;pageLength&quot;: 15,
                   &quot;isResponsive&quot;: false,
                   &quot;isShowPaging&quot;: false,
                   &quot;pagination&quot;: &quot;datatablePagination&quot;
                 }" role="grid" aria-describedby="datatable_info">
            <thead class="thead-light">
              <tr role="row"><th class="table-column-pe-0 sorting_disabled" rowspan="1" colspan="1" aria-label="
                  
                    
                    
                  
                " style="width: 28.09375px;">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                    <label class="form-check-label" for="datatableCheckAll"></label>
                  </div>
                </th><th class="table-column-ps-0 sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 202.578125px;">Name</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 137.921875px;">Position</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" style="width: 120.0625px;">Country</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 101.78125px;">Status</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Portfolio: activate to sort column ascending" style="width: 138.421875px;">Portfolio</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 73.953125px;">Role</th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 89.25px;"></th></tr>
            </thead>

            <tbody>
              

              

              

              

              

              

              

              

              

              

              

              

              

              

              

              

              

              

              

              

              

              

              

              
            <tr role="row" class="odd">
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll1">
                    <label class="form-check-label" for="datatableCheckAll1"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img10.jpg" alt="Image Description">
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Amanda Harvey <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Top endorsed" aria-label="Top endorsed"></i></span>
                      <span class="d-block fs-5 text-body">amanda@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Director</span>
                  <span class="d-block fs-5">Human resources</span>
                </td>
                <td>United Kingdom</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">72%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr><tr role="row" class="even">
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck2">
                    <label class="form-check-label" for="usersDataCheck2"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-primary avatar-circle">
                      <span class="avatar-initials">A</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Anne Richard</span>
                      <span class="d-block fs-5 text-body">anne@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Seller</span>
                  <span class="d-block fs-5">Branding products</span>
                </td>
                <td>United States</td>
                <td>
                  <span class="legend-indicator bg-warning"></span>Pending
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">24%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 24%" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr></tbody>
          </table><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 15 of 24 entries</div></div>
        </div>
          
          <div class="card-footer">
          <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
            <div class="col-sm mb-2 mb-sm-0">
              
            <div class="col-sm-auto">
              <div class="d-flex justify-content-center justify-content-sm-end">
                <!-- Pagination -->
                <nav id="datatablePagination" aria-label="Activity pagination"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul id="datatable_pagination" class="pagination datatable-custom-pagination"><li class="paginate_item page-item disabled"><a class="paginate_button previous page-link" aria-controls="datatable" data-dt-idx="0" tabindex="0" id="datatable_previous"><span aria-hidden="true">Prev</span></a></li><li class="paginate_item page-item active"><a class="paginate_button page-link" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_item page-item"><a class="paginate_button page-link" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_item page-item"><a class="paginate_button next page-link" aria-controls="datatable" data-dt-idx="3" tabindex="0" id="datatable_next"><span aria-hidden="true">Next</span></a></li></ul></div></nav>
              </div>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
</div>
<!-- End Card -->

<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Users</h4>
                        <p class="card-category">Manage users</p>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('backend.users.create') }}" class="btn btn-info pull-right"> Add
                            User </a>
                    </div>
                </div>
            </div>
            <div class="card-body table-full-width table-responsive">
                <div class="col-md-12">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js_content')
    <script>
        $(function() {

            $('.table').DataTable({
                processing: true,
                serverSide: true,
                bAutoWidth: false,

                ajax: '{{ route('backend.users.get') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'is_admin',
                        name: 'is_admin'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
