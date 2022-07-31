@foreach ($products as $key => $product)
    <div class="cart-item mb-3">
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('uploads/all/' . $product->model->uploads->file_name) }}" alt=""
                    class="thumbnail border rounded w-100">
            </div>
            <div class="col-7">
                <div class="item-meta mb-2">
                    @php
                        if (count($product->options)) {
                            echo $product->name . ' - ' . $product->options->name;
                        } else {
                            echo $product->name;
                        }
                    @endphp
                </div>
                <div class="item-meta mb-2">Quanity {{ $product->qty }}</div>
            </div>
            <div class="col-2">
                <span class="text-primary fw-800">${{ $product->price }}</span>
            </div>
        </div>
    </div>
@endforeach
<div class="cart-item mb-3">
    <div class="row">
        <div class="col-2">
            <span class="fs-5">Shipping</span>
        </div>
        <div class="offset-md-8 col-md-2">
            <span class="fs-5">
                $@php
                    $shippingPrice = Session::get('shipping_price', 0);
                    echo number_format($shippingPrice / 100, 2);
                @endphp
            </span>
        </div>
    </div>
</div>
<div class="cart-item mb-3">
    <div class="row">
        <div class="col-2">
            <span class="fs-5">Tax</span>
        </div>
        <div class="offset-md-8 col-md-2">
            <span class="fs-5">
                $@php
                    $taxPrice = 0;
                    foreach ($products as $product) {
                        $taxPrice += $product->qty * $product->price * $product->model->taxPrice();
                    }
                    echo number_format($taxPrice / 100 / 100, 2);
                @endphp
            </span>
        </div>
    </div>
</div>
<div class="cart-item mb-3">
    <div class="row">
        <div class="col-2">
            <span class="fs-5">Total</span>
        </div>
        <div class="offset-md-8 col-md-2">
            <span>
                <span class="fs-5">
                    ${{ number_format(Cart::total() + $shippingPrice / 100 + $taxPrice / 10000, 2) }}
                </span>
            </span>
        </div>
    </div>
</div>
