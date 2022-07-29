<x-guest-layout page-title="Shipping Detail">
    <div class="container">
        <div class="col-lg-10 col-md-10 mx-auto checkout-wrap">
            <div class="row">
                <div class="col-lg-7">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Cart</a></li>
                            <li class="breadcrumb-item"><a href="#">Shipping</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Billing</li>
                            <li class="breadcrumb-item active" aria-current="page">Payment</li>
                        </ol>
                    </nav>
                    <form action="{{ url('/checkout/shipping') }}" method="POST">
                        @csrf
                        <div class="checkout-card">
                            <div class="checkout-card-body">
                                <h3 class="mb-3 fs-20">Shipping method</h3>
                                <div class="row mb-3">
                                    @foreach ($shippings as $i => $shipping)
                                        <div class="option">
                                            <input type="radio" value="{{ $shipping->id }}"
                                                class="btn-check shipping_option" name="shipping_option"
                                                id="option{{ $i }}" autocomplete="off"
                                                @if ($i == 0) checked @endif
                                                data-price="{{ $shipping->price / 100 }}" />
                                            <label class="btn btn-default shipping-radio" for="option{{ $i }}"
                                                style="width: 100%;">
                                                <span>{{ $shipping->name }} ({{ $shipping->description }})</span>
                                                <span class="float-right">${{ $shipping->price / 100 }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="checkout-card">
                            <div class="checkout-card-body">
                                <h3 class="mb-3 fs-20">Shipping Address</h3>
                                @include('includes.validation-form')
                                <x-user-info :countries="$countries" />
                                <div class="row mb-3">
                                    <div class="offset-md-3 col-md-8">
                                        <label for="isRemember">
                                            <input type="checkbox" name="isRemember" id="isRemember"> Remember Address
                                        </label>
                                        <button type="submit" class="btn btn-primary float-end">Continue</button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom mb-3 fs-3">Order Details</div>
                            <x-products-table locale="checkout" :instance="'default'" />
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end checkout-wrap -->
    </div><!-- end container -->
    <script>
        $(function() {
            var totalPrice = $('#total_td').find('div').text().split('$')[1] * 1 - $('#shipping_td').find('div').text().split('$')[1] * 1;

            $('.shipping_option').click(function() {
                var shippingPrice = $(this).attr('data-price');

                $('#shipping_td').text(`$${shippingPrice}`);

                $('#total_td').find('div').text(
                    `$${(Math.round((totalPrice + shippingPrice * 1) * 100) / 100).toFixed(2)}`);
            })

            $('#option0').click();

        })
    </script>
</x-guest-layout>
