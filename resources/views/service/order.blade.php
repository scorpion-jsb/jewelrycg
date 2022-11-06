<x-app-layout :page-title="'Order #' . $order->id">
  <div class="container">
      <div class="col-lg-8 col-md-10 py-9 mx-auto checkout-wrap">
          <h1 class="fw-800 mb-3">Thanks for shopping with us!</h1>
          <p>We appreciate your order, we’re currently processing it. So hang tight, and we’ll send you confirmation
              very soon!</p>
          <div class="order-items-card border-bottom py-4 mb-5">
              <div class="row">
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Order number</div>
                      <div class="fs-14 text-primary">#{{ $order->id }}</div>
                  </div>
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Payment status</div>
                      <div class="fs-14 ">
                          {{ ucwords(Config::get('constants.oder_payment_status')[$order->status_payment]) }}</div>
                  </div>
                  {{-- <div class="col-lg-3 col-6 mb-2">
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
                  </div> --}}
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Date created</div>
                      <div class="fs-14 ">{{ date('F d, Y', strtotime($order->created_at)) }}</div>
                  </div>
              </div>
          </div>

          <div class="order-items-card pb-4">
              <div class="row">
                  <div class="col-lg-2 col-3">
                      <img src="{{ $order->service->thumb->getImageOptimizedFullName(150) }}" alt=""
                          class="thumbnail border w-100">
                  </div>
                  <div class="col-lg-10 col-9">
                      <div class="order-item-title fs-24 py-2 fw-600">
                          {{ $order->service->name }}
                      </div>
                      <div class="order-item-qty-price fs-16 pb-2">
                        <span class="fw-600">Price</span>
                        ${{ number_format($order->package->price, 2) }}
                      </div>
                      <div class="is_downloadable fw-600 fs-16">
                          @php
                              $orderStatus = Config::get('constants.service_order_status');
                          @endphp
                          <div class="d-flex mt-2">
                              <span class="d-block" data-item-id="{{ $order->id }}">
                                  @foreach ($orderStatus as $key => $status)
                                      @if ($key != 0)
                                          @if ($order->status == $key)
                                              {{ 'Status: ' . $status }}
                                          @endif
                                      @endif
                                  @endforeach
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-lg-4 mt-3">
                  {{-- <div class="card">
                      <div class="fs-18 py-2 fw-600 card-header">Summary</div>
                      <div class="card-body">
                          <div class="mb-2">
                              <span class="fw-600">Subtotal:</span>
                              ${{ number_format($order->total / 100, 2, '.', ',') }}
                          </div>
                          @if ($order->discount)
                              <div class="mb-2">
                                  <span class="fw-600">Discount:</span>
                                  ${{ number_format($order->discount / 100, 2, '.', ',') }}
                              </div>
                          @endif
                          <div class="mb-2">
                              <span class="fw-600">Shipping:</span>
                              ${{ number_format($order->shipping_total / 100, 2, '.', ',') }}
                          </div>
                          <div class="mb-2">
                              <span class="fw-600">Tax:</span>
                              ${{ number_format($order->tax_total / 100, 2, '.', ',') }}
                          </div>
                          <div class="mb-2">
                              <span class="fw-600">Total:</span>
                              ${{ number_format($order->grand_total / 100, 2, '.', ',') }}
                          </div>
                      </div>
                  </div> --}}
              </div>
              <div class="col-lg-4 mt-3">
                  {{-- <div class="card">
                      <div class="fs-18 py-2 fw-600 card-header">Billing Address</div>
                      <div class="card-body">
                          @include('includes.validation-form')
                      </div>
                  </div> --}}
              </div>
          </div>
      </div>

      <script>
          $(function() {
              $(".variant_download").click(function() {
                  document.location.replace("{{ url('product/download') }}" + "?variant_id=" + $(this).attr(
                      'data-variant-id'));
              });

              $(".product_download").click(function() {
                  document.location.replace("{{ url('product/download') }}" + "?product_id=" + $(this).attr(
                      'data-product-id'));
              });
          })
      </script>

</x-app-layout>
