<div class="container">
    <div class="col-lg-8 col-md-10 mx-auto checkout-wrap">
        @foreach ($products as $key => $product)
        <div class="cart-item">
            <div class="row">
                <div class="col-2">
                    <img src="{{ asset('uploads/all/' . $product->model->uploads->file_name) }}" alt="" class="thumbnail border rounded w-100">
                <div>
                <div class="col-8">
                    @php
                        if (count($product->options)) {
                            echo $product->name . ' - ' . $product->options->name;
                        } else {
                            echo $product->name;
                        }
                    @endphp
                <div>
                <div class="col-2">

                <div>
            </div>  
        </div>
        @endforeach
    </div>
</div>


<style>
    #total_td>div,
    #shipping_td,
    #tax_td {
        font-weight: bold;
        font-size: medium;
    }
</style>

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
                        <img src="{{ asset('uploads/all/' . $product->model->uploads->file_name) }}" alt=""
                            class="thumbnail" style="width: 80px;">
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
                                <form action="{{ route('cart.wishlist') }}" method="post" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="row_id" value="{{ $product->rowId }}">
                                    <button type="submit" class="btn btn-primary" title="Add to Cart">
                                        <i class="fa-solid fa-cart-arrow-down"></i>
                                    </button>
                                </form>
                                <form action="{{ route('cart.wishlist') }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="row_id" value="{{ $product->rowId }}">
                                    <button type="submit" class="btn btn-danger" title="Remove from Wishlist">
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
                                    <input type="number" value="{{ $product->qty }}" placeholder="{{ $product->qty }}"
                                        name="quantity" min="1" max="100" class="form-control quantity"
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
                    {{-- <td>
                        $@php
                            if (count($product->options)) {
                                echo number_format(($product->options->price * $product->qty * $product->model->taxPrice()) / 10000, 2);
                            } else {
                                echo number_format(($product->price * $product->qty * $product->model->taxPrice()) / 10000, 2);
                            }
                        @endphp
                    </td> --}}
                    <td>
                        <div class="justify-content-between total-price">
                            $@php
                                $price = 0;
                                if (count($product->options)) {
                                    $price = $product->options->price;
                                } else {
                                    $price = $product->price;
                                }
                                
                                echo number_format($product->qty * $price, 2);
                            @endphp
                        </div>
                    </td>
                    <td>
                        <a href="{{ url('cart/remove') . '/' . $product->rowId }}" class="btn btn-danger"
                            title="Remove from chart"><i class="bi bi-x-lg"></i></a>
                    </td>
                @endif
            </tr>
        @endforeach
        @if ($locale != 'orders.show')
            @if ($locale != 'cart')
                <tr id="total">
                    <th scope="row">Shipping:</th>
                    <td></td>
                    <td></td>
                    <td id="shipping_td">
                        <div>
                            $@php
                                $shippingPrice = Session::get('shipping_price', 0);

                                echo number_format($shippingPrice / 100, 2);
                            @endphp
                        </div>
                    </td>
                </tr>
                <tr id="total">
                    <th scope="row">Tax:</th>
                    <td></td>
                    <td></td>
                    <td id="tax_td">
                        <div>
                            $@php
                                $taxPrice = 0;
                                foreach ($products as $product) {
                                    $taxPrice += $product->qty * $product->price * $product->model->taxPrice();
                                }

                                echo number_format($taxPrice / 100 / 100, 2);
                            @endphp
                        </div>
                    </td>
                </tr>
            @endif
            <tr id="total">
                <th scope="row">Total:</th>
                <td></td>
                <td></td>
                <td id="total_td"
                    {{ in_array($locale, ['checkout', 'wishlist']) || $products->count() == 0 ? 'colspan=2' : null }}>
                    @if ($locale == 'cart')
                        <div class="">
                            ${{ Cart::total() }}
                        </div>
                    @else
                    <div class="">
                        ${{ number_format(Cart::total() + $shippingPrice / 100 + $taxPrice / 10000, 2) }}
                    </div>
                @endif
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    $('.quantity').change(function() {
        var price = $(this).parents('td').prev().text().split('$')[1]
        var quantity = $(this).val()

        var total = price * quantity

        $(this).parents('td').next().find('div').text('$' + (Math.round(total * 100) / 100).toFixed(2));

        var rowId = $(this).attr('id');

        $.ajax({
            method: 'post',
            url: "{{ route('cart.edit.qty') }}",
            data: {
                row_id: rowId,
                quantity: quantity
            },
            success: function(data) {
                total = 0;
                $('tbody').find('tr').each(function() {
                    if ($(this).attr('id') != 'total') {
                        var price = $(this).find('div').text().split('$')[1];
                        var quantity = $(this).find('input').val()

                        total += price * quantity;
                    }
                })

                $('#total_td').find('div').text('$' + (Math.round(total * 100) / 100).toFixed(2));

            }
        })

    })
</script>
