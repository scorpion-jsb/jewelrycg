<x-app-layout :page-title="'Order ' . $order->id">
    <div class="container">
        <div class="col-lg-8 col-md-10 py-8 mx-auto checkout-wrap">
            <h1 class="fw-800">Thanks for shopping with us!</h1>
            <p>We appreciate your order, we’re currently processing it. So hang tight, and we’ll send you confirmation very soon!</p>
            <div class="order-items-card border-bottom py-4 mb-4">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="w-100 fs-18 fw-600">Order number</div>
                        <div class="fs-14 text-primary">#0000</div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="w-100 fs-18 fw-600">Payment status</div>
                        <div class="fs-14 ">Paid</div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="w-100 fs-18 fw-600">Fufilment status</div>
                        <div class="fs-14 ">#0000</div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="w-100 fs-18 fw-600">Date created</div>
                        <div class="fs-14 ">July 30, 2022</div>
                    </div>
                </div>
            </div>

            @foreach ($order->items as $key => $item)
                <div class="order-items-card pb-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="{{ asset('uploads/all/' . $item->product->uploads->file_name) }}" alt="" class="thumbnail border w-100">
                        </div>
                        <div class="col-lg-10">
                            <div class="order-item-title fs-24 mb-2 fw-600">
                            @php
                                if ($item->product_variant != 0) {
                                    echo $item->product_name . ' - ' . $item->product_variant_name;
                                } else {
                                    echo $item->product_name;
                                }
                            @endphp
                            </div>
                            <div class="order-item-qty-price"><span class="fw-600">Quantity</span> {{$item->quantity}} | <span class="fw-600">Price</span> ${{ number_format($item->price / 100, 2) }}</div>
                            @if ($item->product->is_digital)
                                <div class="is_downloadable">
                                @if ($item->product_variant)
                                    <a href="{{ asset('uploads/all/') . '/' . $item->productVariant->asset->file_name }}" target="_blank"><i class="bi bi-download"></i> Download</a>
                                @else
                                    <a href="{{ asset('uploads/all/') . '/' . $item->product->digital->file_name }}" target="_blank"><i class="bi bi-download"></i> Download</a>
                                @endif
                                </div>
                            @endif
                        </div>
                        <!--<div class="col-lg-2">${{ number_format($item->price / 100, 2) }}</div>-->
                    </div>
                </div>
            @endforeach
            
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Order Info</h5>
                        <hr>
                        @include('includes.validation-form')
                        <x-order-info :order="$order" />
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Order's Product{{ $order->items->count() > 1 ? 's' : null }}</h5>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $key => $item)
                                    <tr>
                                        <td>
                                            <a href="{{ route('products.show', $item->product->slug) }}" class="link-dark">
                                                <img src="{{ asset('uploads/all/' . $item->product->uploads->file_name) }}" alt="" class="thumbnail" style="width: 80px;">
                                                @php
                                                    if ($item->product_variant != 0) {
                                                        echo $item->product_name . ' - ' . $item->product_variant_name;
                                                    } else {
                                                        echo $item->product_name;
                                                    }
                                                @endphp
                                            </a>
                                        </td>
                                        <td>
                                            <div class=" justify-content-between">
                                                ${{ number_format($item->price / 100, 2) }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" justify-content-between">
                                                {{$item->quantity}}                                            
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" justify-content-between">
                                                 ${{number_format($item->price / 100 * $item->quantity, 2)}}
                                            </div>
                                        </td>
                                        <td>
                                            @if ($item->product->is_digital)
                                                @if ($item->product_variant)
                                                    <a href="{{ asset('uploads/all/') . '/' . $item->productVariant->asset->file_name }}" target="_blank"><i class="bi bi-download"></i> </a>
                                                @else
                                                    <a href="{{ asset('uploads/all/') . '/' . $item->product->digital->file_name }}" target="_blank"><i class="bi bi-download"></i> </a>
                                                @endif
                                            @else
                                                <a ><i class="bi bi-download"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
