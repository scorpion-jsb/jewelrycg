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
                                    @if ($locale != 'wishlist')
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    @endif
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr id="{{ $product->rowId }}">
                                        <td>
                                            <a href="{{ route('products.show', $product->slug) }}" class="link-dark">
                                                @php
                                                    if (count($product->options)) {
                                                        echo $product->name . ' - ' . $product->options->name;
                                                    } else {
                                                        echo $product->name;
                                                    }
                                                @endphp
                                            </a>
                                        </td>
                                        <td>
                                            <div class=" justify-content-between">
                                                $@php
                                                    if (count($product->options)) {
                                                        echo number_format($product->options->price, 2);
                                                    } else {
                                                        echo number_format($product->price, 2);
                                                    }
                                                @endphp
                                                @if ($locale == 'wishlist')
                                                    <div class="col-8" align="end">
                                                        <form action="{{ route('cart.wishlist') }}" method="post"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" name="row_id"
                                                                value="{{ $product->rowId }}">
                                                            <button type="submit" class="btn btn-primary"
                                                                title="Add to Cart">
                                                                <i class="fa-solid fa-cart-arrow-down"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('cart.wishlist') }}" method="post"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="hidden" name="row_id"
                                                                value="{{ $product->rowId }}">
                                                            <button type="submit" class="btn btn-danger"
                                                                title="Remove from Wishlist">
                                                                <i class="bi bi-x-lg"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>

                                        @if ($locale != 'wishlist')
                                            <td>
                                                @if ($locale == 'cart')
                                                    <div class=" justify-content-between">
                                                        <div class="col-6">
                                                            <input type="number" value="{{ $product->qty }}"
                                                                placeholder="{{ $product->qty }}" name="quantity"
                                                                min="1" max="100"
                                                                class="form-control quantity"
                                                                id="{{ $product->rowId }}">
                                                        </div>
                                                        <?php $out_of_stock[$key] = $product->qty > $product->model->quantity && $product->model->is_trackingquantity; ?>
                                                        @if ($out_of_stock[$key])
                                                            <div class="col-2">
                                                                <span class="badge rounded-pill text-light bg-danger">
                                                                    In Stock: {{ $product->model->quantity }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                        @csrf
                                                    </div>
                                                @else
                                                    {{ $product->qty }}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="justify-content-between total-price">
                                                    $@php
                                                        $price = 0;
                                                        if (count($product->options)) {
                                                            $price = number_format($product->options->price, 2);
                                                        } else {
                                                            $price = number_format($product->price, 2);
                                                        }
                                                        
                                                        echo $product->qty * $price;
                                                    @endphp
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ url('cart/remove') . '/' . $product->rowId }}"
                                                    class="btn btn-danger" title="Remove from chart"><i
                                                        class="bi bi-x-lg"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                @if ($locale != 'orders.show')
                                    <tr id="total">
                                        <th scope="row">Total:</th>
                                        <td></td>
                                        <td></td>
                                        <td id="total_td"
                                            {{ in_array($locale, ['checkout', 'wishlist']) || $products->count() == 0 ? 'colspan=2' : null }}>
                                            <div class="">
                                                ${{ Cart::total() }}
                                            </div>
                                        </td>
                                        @if ($locale == 'cart' && $products->count() > 0)
                                            <td>
                                                <a href="{{ route('checkout.index') }}"
                                                    class="btn btn-success {{ isset($out_of_stock) && in_array(true, $out_of_stock) ? 'disabled' : null }}">Proceed
                                                    to Checkout</a>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
