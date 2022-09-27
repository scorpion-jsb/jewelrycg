@php
$subTotal = 0;
@endphp

@foreach ($products as $key => $product)
    @php
        $subTotal += $product->qty * $product->price;
    @endphp
    <div class="cart-item mb-3">
        <div class="row">
            <div class="col-3">
                <img src="{{ $product->model->uploads->getImageOptimizedFullName() }}" alt=""
                    class="thumbnail border rounded w-100">
            </div>
            <div class="col-8">
                <div class="item-meta text-nowrap mb-2">
                    @if(count($product->options))
                        {{$product->name}} ( {{$product->options->name}} )
                    @else
                        {{$product->name}}
                    @endif
                </div>
                <div class="item-meta mb-2"><span class="fw-800">Quantity:</span> {{ $product->qty }}</div>
            </div>
            <div class="col-1 text-right">
                <span class="text-primary fw-800">${{ number_format($product->price, 2, ".", ",") }}</span>
            </div>
        </div>
    </div>
@endforeach

@php
use App\Models\Coupon;
$coupon = Coupon::find(1);
$discount = 0;
if (isset($coupon) && $coupon != null) {
    if ($coupon->type == 0) {
        $discount = $coupon->amount;
    } else {
        $discount = $subTotal * (100 - $coupon->amount) / 100;
    }
}
@endphp

<div class="cart-item mb-3 pt-3">
    <div class="row">
        <div class="col-4">
            <span class="fw-800">Sub Total</span>
        </div>
        <div class="col-auto ml-auto text-right">
            <span class="fw-800" id="sub_total_price">
                ${{ number_format($subTotal, 2, '.', ',') }}
            </span>
        </div>
    </div>
</div>
@if ($discount > 0)
<div class="cart-item mb-3">
    <div class="row">
        <div class="col-4">
            <span class="fw-800">Discount</span>
        </div>
        <div class="col-auto ml-auto text-right">
            <span class="fw-800" id="discount_price">
                -${{ number_format($discount, 2, '.', ',') }}
            </span>
        </div>
    </div>
</div>
@endif
<div class="cart-item mb-3">
    <div class="row">
        <div class="col-4">
            <span class="fw-800">Shipping</span>
        </div>
        <div class="col-auto ml-auto text-right">
            <span class="fw-800" id="shipping_price">
                $@php
                    $shippingPrice = Session::get('shipping_price', 0);
                    echo number_format($shippingPrice / 100, 2, ".", ",");
                @endphp
            </span>
        </div>
    </div>
</div>
<div class="cart-item mb-3">
    <div class="row">
        <div class="col-4">
            <span class="fw-800">Tax</span>
        </div>
        <div class="col-auto ml-auto text-right">
            <span class="fw-800" id="tax_price">
                $@php
                    $taxPrice = 0;
                    foreach ($products as $product) {
                        $taxPrice += $product->qty * $product->price * $product->model->taxPrice();
                    }
                    echo number_format($taxPrice / 100 / 100, 2, ".", ",");
                @endphp
            </span>
        </div>
    </div>
</div>
<div class="cart-item mb-3">
    <div class="row">
        <div class="col-4">
            <span class="fw-800">Total</span>
        </div>
        <div class="col-auto ml-auto text-right">
            <span>
                <span class="fw-800 text-primary" id="total_price">
                    ${{number_format($subTotal + $shippingPrice/100 + $taxPrice/100/100, 2, ".", ",")}}
            </span>
        </div>
    </div>
</div>
