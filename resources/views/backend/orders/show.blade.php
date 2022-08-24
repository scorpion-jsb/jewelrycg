@extends('backend.layouts.app', ['activePage' => 'orders', 'title' => 'Order', 'navName' => 'orderslist', 'activeButton' => 'catalogue'])

@section('content')
  <style>
    .order-status {
      width: max-content;
      padding: 2px 4px;
    }
  </style>

  <div class="page-header">
      <div class="row align-items-end">
          <h1 class="page-header-title">Order</h1>
      </div>
  </div>

  <div class="container">
      <div class="col-lg-10 col-md-12 py-4 mx-auto checkout-wrap">
          <div class="order-items-card border-bottom py-4 mb-4">
              <div class="row">
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Order number</div>
                      <div class="fs-14 text-primary">#{{ $order->order_id }}</div>
                  </div>
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Payment status</div>
                      <div class="fs-14" title="{{ $order->status_payment_reason }}">
                          {{ ucwords(Config::get('constants.oder_payment_status')[$order->status_payment]) }}</div>
                  </div>
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Fufilment status</div>
                      <div class="fs-14 ">
                          @php
                              $status = 'Fulfilled';
                              foreach ($order->items as $key => $item) {
                                  if ($item->status_fulfillment == '1') {
                                      $status = 'Unfulfilled';
                                  }
                              }
                              
                              echo $status;
                          @endphp
                      </div>
                  </div>
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Date created</div>
                      <div class="fs-14 ">{{ date('F d, Y', strtotime($order->created_at)) }}</div>
                  </div>
              </div>
          </div>

          @foreach ($order->items as $key => $item)
              <div class="order-items-card pb-4">
                  <div class="row">
                      <div class="col-lg-2 col-3">
                          <img src="{{ asset('uploads/all/' . $item->product->uploads->file_name) }}" alt=""
                              class="thumbnail border w-100">
                      </div>
                      <div class="col-lg-10 col-9">
                          <div class="order-item-title fs-24 py-2 fw-600">
                              @php
                                  if ($item->product_variant != 0) {
                                      echo $item->product_name . ' - ' . $item->product_variant_name;
                                  } else {
                                      echo $item->product_name;
                                  }
                              @endphp
                          </div>
                          <div class="order-item-qty-price fs-16 pb-2"><span class="fw-600">Quantity</span>
                              {{ $item->quantity }} | <span class="fw-600">Price</span>
                              ${{ number_format($item->price / 100, 2) }}</div>
                          @if ($item->product->is_digital)
                              <div class="is_downloadable fw-600 fs-16" data-item-id="{{ $item->id }}">
                                  @if (!$item->product->digital_download_assets)
                                      <div class="order-item-title fs-18 fw-600">File anavailable. Please contact support.</div>
                                  @else
                                      <a href="javascript:;" class="my-2" id="product_download" data-product-id="{{ $item->id }}" style="display: flex;">
                                          <i class="bi bi-file-earmark-arrow-down"></i> Download</a>
                                  @endif
                                  @php
                                    $orderStatus = Config::get('constants.order_item_status_fulfillment');
                                  @endphp
                                    <div class="d-flex">
                                        <select class="order-status form-select" name="" id="" data-item-id="{{ $item->id }}" style="width: 120px;height:35.75px;padding-left:10px">
                                          @foreach ($orderStatus as $key => $status)
                                            @if ($key != 0)
                                              <option @if ($item->status_fulfillment == $key) selected @endif value="{{ $key }}">{{ $status }}</option>
                                            @endif
                                          @endforeach                                    
                                        </select>
                                          <input class='track_number form-control mx-2' type='text' placeholder='Tracking Number' value='{{ $item->status_tracking }}' style="width: 100px;@if ($item->status_fulfillment != 2)display: none;@endif" /> 
                                          <button class='save_track_number btn btn-sm btn-primary' onclick="changeStatusTracking(event)"  @if ($item->status_fulfillment != 2)style="display: none"@endif>save</button>
                                    </div>
                              </div>
                          @endif
                      </div>
                      <!--<div class="col-lg-2">${{ number_format($item->price / 100, 2) }}</div>-->
                  </div>
              </div>
          @endforeach

          <div class="col-lg-4">
              <h5 class="fs-18 py-2 fw-600">Billing Address</h5>
              @include('includes.validation-form')
              <x-order-info :order="$order" />
          </div>
      </div>
  </div>

  <script>
    $(function() {
      $('.order-status').change(function () {
        var orderItemId = $(this).attr('data-item-id');
        if ($(this).val() == '2') {
					$(this).closest(".is_downloadable").find('.track_number').css('display', 'inline-block')
					$(this).closest(".is_downloadable").find('.save_track_number').css('display', 'inline-block')
        } else {
					$(this).closest(".is_downloadable").find(".track_number").css('display', 'none');
					$(this).closest(".is_downloadable").find(".save_track_number").css('display', 'none');
        }
        $.ajax({
          url: "{{ url('backend/orders/item') }}" + "/" + orderItemId,
          type: 'put',
          data: {
            "_token": "{{ csrf_token() }}",
            status: $(this).val()
          },
          success: function (data) {
            console.log(data)
          }
        })
      });

    });
	function changeStatusTracking(e) {
        var orderItemId = $(e.target).closest(".is_downloadable").attr("data-item-id");
        $.ajax({
            url: "{{ url('backend/orders/status_tracking/') }}" + "/" + orderItemId,
            type: 'put',
            data: {
                "_token": "{{ csrf_token() }}",
                status: $(e.target).closest(".is_downloadable").find(".track_number").val()
            },
            success: function(data) {
                console.log(data)
            }
        })
    }
  </script>
@endsection
