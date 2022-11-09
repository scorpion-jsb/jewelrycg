<x-app-layout :page-title="'ORDER #' . $order->order_id">
<div class="container">
    <div class="col-lg-11 col-md-10 py-9 mx-auto checkout-wrap">
        <div class="row">
            <div class="col-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="fw-700">Order Started</h4>
                        <p class="p-0"><b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> sent all the information you need so you can start working on this order. You got this!</p>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="timeline-item pt-2 pb-4 border-bottom">
                            <i class="bi bi-clipboard-check p-1"></i>
                            <span class=""><b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> placed the order {{ date('F d, Y', strtotime($order->created_at)) }}</span>
                        </div>
                        <div class="timeline-item pt-2 pb-4 border-bottom">
                            <i class="bi bi-clipboard-check p-1"></i>
                            <span class=""><b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> sent the requirements {{ date('F d, Y', strtotime($order->created_at)) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mb-4 time-left">
                    <div class="card-body">
                        <h4 class="fw-700">{{ date('F d, Y h:i A', strtotime($order->original_delivery_time)) }}</h4>
                        <a class="btn btn-primary" href="#">Deliver Now</a>
                    </div>
                </div>
                <div class="card mb-4 order-details">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ $order->service->thumb->getImageOptimizedFullName(150) }}" alt="" class="thumbnail border w-100">
                            </div>
                            <div class="col-9">
                                <h4>{{ $order->service->name }}</h4>
                                <span class="d-block rounded border" data-item-id="{{ $order->id }}">
                                    {{ 'Status: ' . Config::get('constants.service_order_status')[$order->status] }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
          <h1 class="fw-800 mb-3">Thanks for shopping with us!</h1>
          <p>We appreciate your order, we’re currently processing it. So hang tight, and we’ll send you confirmation
            very soon!</p>
          <div class="order-items-card border-bottom py-4 mb-5">
              <div class="row">
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Order number</div>
                      <div class="fs-14 text-primary">#{{ $order->order_id }}</div>
                  </div>
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Payment status</div>
                      <div class="fs-14 ">
                          {{ ucwords(Config::get('constants.oder_payment_status')[$order->status_payment]) }}</div>
                  </div>
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Date created</div>
                      <div class="fs-14 ">{{ date('F d, Y', strtotime($order->created_at)) }}</div>
                  </div>
                
                  @if ($order->status)
                  <div class="col-lg-3 col-6 mb-2">
                      <div class="w-100 fs-18 fw-600">Est Deliver Date</div>
                      <div class="fs-14 ">{{ date('F d, Y h:i A', strtotime($order->original_delivery_time)) }}</div>
                  </div>
                  @endif
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
                          <span class="fw-600">Price:</span>
                          ${{ number_format($order->package_price, 2) }}
                      </div>
                      <div class="order-item-qty-price fs-16 pb-2">
                        <span class="fw-600">Buyer Name:</span>
                        {{ $order->user->first_name . " " . $order->user->last_name }}
                      </div>
                      <div class="is_downloadable fw-600 fs-16">
                          <div class="d-flex mt-2">
                                <span class="d-block" data-item-id="{{ $order->id }}">
                                    {{ 'Status: ' . Config::get('constants.service_order_status')[$order->status] }}
                                </span>
                          </div>
                      </div>
                  </div>
              </div>

        </div><!-- end .row-->
    </div>
</div>
@section('js')
<script>
</script>
@endsection

</x-app-layout>
