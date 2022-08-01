<x-app-layout :page-title="'Order ' . $order->id">
    <div class="container">
        <div class="col-lg-8 col-md-10 py-8 mx-auto checkout-wrap">
            <h1 class="fw-800">Thanks for shopping with us!</h1>
            <p>We appreciate your order, we’re currently processing it. So hang tight, and we’ll send you confirmation
                very soon!</p>
            <div class="order-items-card border-bottom py-4 mb-4">
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
                        <div class="w-100 fs-18 fw-600">Fufilment status</div>
                        <div class="fs-14 ">
                            @php
                                $status = 'Completed';
                                foreach ($order->items as $key => $item) {
                                    if ($item->fulfilment_status != '3' && !$item->product->is_digital && !$item->product->is_virtual) {
                                        $status = 'Pending';
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
                                <div class="is_downloadable fw-600 fs-16">
                                    @if ($item->productVariant)
                                        @if (!$item->productVariant->has('asset') || $item->productVariant->asset->file_name == 'none')
                                            File not available for download. Please contact support.
                                        @else
                                            <a href="javascript:;" class="variant_download"
                                                data-variant-id="{{ $item->product_variant }}">
                                                <i class="bi bi-file-earmark-arrow-down"></i> Download</a>
                                        @endif
                                    @else
                                        @if (!$item->product->digital->id)
                                            File not available for download. Please contact support.
                                        @else
                                            <a href="javascript:;" id="product_download"
                                                data-product-id="{{ $item->product_id }}">
                                                <i class="bi bi-file-earmark-arrow-down"></i> Download</a>
                                        @endif
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-lg-4">
                <h5 class="fs-18 py-2 fw-600">Billing Address</h5>
                @include('includes.validation-form')
                <x-order-info :order="$order" />
            </div>
        </div>

        <script>
            $(function() {
                $('.variant_download').click(function() {
                    document.location.replace("{{ url('product/download') }}" + "?variant_id=" + $(this).attr(
                        'data-variant-id'));
                });

                $('.product_download').click(function() {
                    document.location.replace("{{ url('product/download') }}" + "?product_id=" + $(this).attr(
                        'data-product-id'));
                })
            })
        </script>

</x-app-layout>
