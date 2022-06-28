@extends('backend.dashboard.layouts.app', ['activePage' => 'products', 'title' => 'All Users', 'navName' => 'productstags', 'activeButton' => 'laravel'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">All Product Tags</h1>
    </div>
    <!-- End Row -->
</div>

    <!-- Card -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header card-header-content-md-between">
                    <div class="mb-2 mb-md-0">
                        <h3 class="card-header-title">Add tag</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.product.tags.store') }}" method="POST">
                        @csrf
                        @if ($errors->has('name'))
                            <div class="col-md-12 mb-2">
                                <span class="badge btn-danger col-md-12"> Tag name is required </span>
                            </div>
                        @endif
                        <div class="col-md-12 mb-2">
                            <label for="name">Tag name:</label>
                            <input type="text" name="name" id="name" value="" class="form-control">

                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="name">Slug:</label>
                            <input type="text" name="slug" id="slug" value="" class="form-control">

                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="name">Description:</label>
                            <textarea type="text" name="description" id="name" class="form-control">
                            
                            </textarea>
                        </div>

                        <div class="col-md-12 mb-2">
                            <button type="submit" class="btn btn-primary col-md-12"> Add </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header card-header-content-md-between">
                    <div class="mb-2 mb-md-0">
                        <h3 class="card-header-title">Product tags</h3>
                    </div>
                </div>
                <div class="table-responsive datatable-custom position-relative">
                    <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                        <div class="dt-buttons"> <button class="dt-button buttons-copy buttons-html5 d-none" tabindex="0"
                                aria-controls="datatable" type="button"><span>Copy</span></button> <button
                                class="dt-button buttons-excel buttons-html5 d-none" tabindex="0"
                                aria-controls="datatable" type="button"><span>Excel</span></button> <button
                                class="dt-button buttons-csv buttons-html5 d-none" tabindex="0" aria-controls="datatable"
                                type="button"><span>CSV</span></button> <button
                                class="dt-button buttons-pdf buttons-html5 d-none" tabindex="0" aria-controls="datatable"
                                type="button"><span>PDF</span></button> <button class="dt-button buttons-print d-none"
                                tabindex="0" aria-controls="datatable" type="button"><span>Print</span></button> </div>
                        <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                    class="" placeholder="" aria-controls="datatable"></label></div>
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
                                        rowspan="1" colspan="1"
                                        aria-label="Name: activate to sort column ascending" style="width: 202.578125px;">
                                        Name</th>
                                    <th class="table-column-ps-0 sorting" tabindex="0" aria-controls="datatable"
                                        rowspan="1" colspan="1"
                                        aria-label="Name: activate to sort column ascending" style="width: 202.578125px;">
                                        Slug</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""
                                        style="width: 89.25px;"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td> {{ $tag->id }} </td>
                                        <td> {{ $tag->name }} </td>
                                        <td> {{ $tag->slug }} </td>
                                        <td>
                                            <a href="{{ route('backend.product.tags.edit', $tag->id) }}" class="btn btn-white btn-sm">
                                                <i class="bi-pencil-fill me-1"></i> Edit
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to
                            15
                            of 24
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
                                                        class="paginate_button previous page-link"
                                                        aria-controls="datatable" data-dt-idx="0" tabindex="0"
                                                        id="datatable_previous"><span aria-hidden="true">Prev</span></a>
                                                </li>
                                                <li class="paginate_item page-item active"><a
                                                        class="paginate_button page-link" aria-controls="datatable"
                                                        data-dt-idx="1" tabindex="0">1</a></li>
                                                <li class="paginate_item page-item"><a class="paginate_button page-link"
                                                        aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a>
                                                </li>
                                                <li class="paginate_item page-item"><a
                                                        class="paginate_button next page-link" aria-controls="datatable"
                                                        data-dt-idx="3" tabindex="0" id="datatable_next"><span
                                                            aria-hidden="true">Next</span></a></li>
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
        </div>
    </div>

    </div>
    <!-- End Card -->
@endsection

@section('js_content')
    <script>
        $(document).ready(function() {
            $('#name').keyup(function() {
                var slug = $(this).val()

                if (slug.charAt(slug.length - 1) != " ") {
                    $('#slug').val(slug.replace(/\s+/g, '-').toLowerCase());
                }

            })
        })
    </script>
@endsection
