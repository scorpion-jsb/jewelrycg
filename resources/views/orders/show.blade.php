<x-app-layout :page-title="'Order ' . $order->id">
    <div class="container">
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
