<x-guest-layout page-title="Shipping Detail">
    <div class="checkout-container">
        <div class="checkout-wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-xl-8 col-lg-10 ml-auto p-3">
                        <div class="logo py-4 fw-800 fs-24">#JEWELRYCG</div>
                        <nav class="pb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/cart">Cart</a></li>
                                @if ($isIncludeShipping)
                                    <li class="breadcrumb-item"><a href="/checkout/shipping">Shipping</a></li>
                                @endif
                                <li class="breadcrumb-item active" aria-current="page">Billing</li>
                                <li class="breadcrumb-item" aria-current="page">Payment</li>
                            </ol>
                        </nav>
                        <form action="{{ url('/checkout/billing') }}" method="POST" id="frmBilling">
                            @csrf
                            <div class="checkout-card">
                                <div class="checkout-card-body">
                                    <h3 class="mb-3 fs-20">Billing Address</h3>
                                    @include('includes.validation-form')
                                    <x-user-info :countries="$countries" :billing="$billing" :location="$location" :has-coupon="$has_coupon"/>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            @if (auth()->id())
                                                <label for="isRemember">
                                                    <input type="checkbox" name="isRemember" id="isRemember">
                                                    @if($billing !== "NULL") 
                                                        Update Address
                                                    @else
                                                        Remember Address
                                                    @endif
                                                </label>
                                            @endif
                                            <input type="hidden" value="{{ isset($orderId) ? $orderId : 0 }}" />
                                            <button type="submit" class="btn btn-primary float-end">Continue</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 checkout-sidebar">
                    <div class="col-xl-8 col-lg-10 mr-auto p-3">
                        <div class="cart-items-card">
                            <div class="card-body">
                                <div class="py-4 fw-800 fs-24">Order Details</div>
                                <x-checkout-cart locale="checkout" :instance="'default'" />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end checkout-wrap -->
    </div><!-- end container -->
</x-guest-layout>

<script>
var coupon_available = false;

$(document).ready(function() {
    $('body').on('submit', '#frmBilling', function() {
        var coupon_code = $('#floatingCouponCode').val();
        if (!coupon_available && coupon_code) {
            var data = {
                "_token": "{{ csrf_token() }}",
                "coupon_code": coupon_code,
            };

            $.ajax({
                url: "{{ route('checkout.check_coupon') }}",
                type: "POST",
                data: data,
                dataType: "json",
                success: (result) => {
                    if (result.result == true) {
                        coupon_available = true;
                        $('#floatingCouponCode').removeClass('is-invalid');
                        $('#divCouponErrorMsg').html('').addClass('hidden');

                        $('#hidCouponId').val(result.coupon_id);

                        $('#frmBilling').submit();
                        return;
                    }

                    $('#hidCouponId').val('');
                    $('#floatingCouponCode').addClass('is-invalid');
                    $('#divCouponErrorMsg').html(result.message)
                        .removeClass('is-invalid');
                },
                error: (resp) => {
                    var result = resp.responseJSON;
                    if (result.errors && result.message) {
                        alert(result.message);
                        return;
                    }
                }
            });

            return false;
        }
    });
});
</script>