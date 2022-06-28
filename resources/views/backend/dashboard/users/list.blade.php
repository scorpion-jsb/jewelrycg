@extends('backend.dashboard.layouts.app', ['activePage' => 'users', 'title' => 'All Users', 'navName' => 'userslist', 'activeButton' => 'laravel'])

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-end">
            <h1 class="page-header-title">Users</h1>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Page Header -->


    <!-- Card -->
    <div class="card mb-4">
        <div class="card-header card-header-content-md-between">
            <div class="mb-2 mb-md-0">
                <h3 class="card-header-title">All Users</h3>
            </div>
        </div>
        <div class="table-responsive datatable-custom position-relative">
            <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                <div class="dt-buttons"> <button class="dt-button buttons-copy buttons-html5 d-none" tabindex="0"
                        aria-controls="datatable" type="button"><span>Copy</span></button> <button
                        class="dt-button buttons-excel buttons-html5 d-none" tabindex="0" aria-controls="datatable"
                        type="button"><span>Excel</span></button> <button
                        class="dt-button buttons-csv buttons-html5 d-none" tabindex="0" aria-controls="datatable"
                        type="button"><span>CSV</span></button> <button class="dt-button buttons-pdf buttons-html5 d-none"
                        tabindex="0" aria-controls="datatable" type="button"><span>PDF</span></button> <button
                        class="dt-button buttons-print d-none" tabindex="0" aria-controls="datatable"
                        type="button"><span>Print</span></button> </div>
                <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class=""
                            placeholder="" aria-controls="datatable"></label></div>
                <table id="datatable"
                    class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer"
                    data-hs-datatables-options="{
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
                 }"
                    role="grid" aria-describedby="datatable_info">
                    <thead class="thead-light">
                        <tr role="row">
                            <th class="table-column-pe-0 sorting_disabled" rowspan="1" colspan="1"
                                aria-label="
                  
                    
                    
                  
                "
                                style="width: 28.09375px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="datatableCheckAll">
                                    <label class="form-check-label" for="datatableCheckAll"></label>
                                </div>
                            </th>
                            <th class="table-column-ps-0 sorting" tabindex="0" aria-controls="datatable"
                                rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                style="width: 202.578125px;">Name</th>
                           
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Country: activate to sort column ascending" style="width: 120.0625px;">Country
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Status: activate to sort column ascending" style="width: 101.78125px;">Status
                            </th>
                           
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Role: activate to sort column ascending" style="width: 73.953125px;">Role</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""
                                style="width: 89.25px;"></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($users as $user)
                            <tr role="row" class="odd">
                                <td class="table-column-pe-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="datatableCheckAll1">
                                        <label class="form-check-label" for="datatableCheckAll1"></label>
                                    </div>
                                </td>
                                <td class="table-column-ps-0">
                                    <a class="d-flex align-items-center" href="./user-profile.html">
                                        <div class="avatar avatar-circle">
                                            <img class="avatar-img" src="{{ asset('assets/img/160x160/img10.jpg') }}"
                                                alt="Image Description">
                                        </div>
                                        <div class="ms-3">
                                            <span class="d-block h5 text-inherit mb-0">{{ $user->name }} <i
                                                    class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title=""
                                                    data-bs-original-title="Top endorsed"
                                                    aria-label="Top endorsed"></i></span>
                                            <span class="d-block fs-5 text-body">{{ $user->email }}</span>
                                        </div>
                                    </a>
                                </td>
                                
                                <td>{{ $user->country }}</td>
                                <td>
                                  @if($user->email_verified_at == null)
                                  <span class="legend-indicator bg-warning"></span>Unverified

                                  @else
                                    <span class="legend-indicator bg-success"></span>Verified
                                  @endif
                                    
                                </td>
                               
                                <td>@if( $user->is_admin == 0 )
                                  Customer
                                @elseif( $user->is_admin == 1 )
                                  Admin
                                @else
                                  Seller
                                @endif</td>
                                <td>
                                    <a href="{{ route('backend.users.edit', $user->id) }}" class="btn btn-white btn-sm" 
                                        >
                                        <i class="bi-pencil-fill me-1"></i> Edit
                                </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 15 of 24
                    entries</div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                <div class="col-sm mb-2 mb-sm-0">

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination">
                                <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                    <ul id="datatable_pagination" class="pagination datatable-custom-pagination">
                                        <li class="paginate_item page-item disabled"><a
                                                class="paginate_button previous page-link" aria-controls="datatable"
                                                data-dt-idx="0" tabindex="0" id="datatable_previous"><span
                                                    aria-hidden="true">Prev</span></a></li>
                                        <li class="paginate_item page-item active"><a class="paginate_button page-link"
                                                aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li>
                                        <li class="paginate_item page-item"><a class="paginate_button page-link"
                                                aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li>
                                        <li class="paginate_item page-item"><a class="paginate_button next page-link"
                                                aria-controls="datatable" data-dt-idx="3" tabindex="0"
                                                id="datatable_next"><span aria-hidden="true">Next</span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
    <!-- End Card -->

    
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
