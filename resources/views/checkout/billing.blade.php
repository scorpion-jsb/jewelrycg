<x-guest-layout page-title="Shipping Detail">
    <div class="container">
        <div class="col-lg-8 col-md-10 mx-auto checkout-wrap">
            <div class="row">
                <div class="col-lg-7">
                    <form action="{{ url('/checkout/billing') }}" method="POST">
                        @csrf
                        <div class="checkout-card">
                            <div class="checkout-card-body">
                                <h3 class="mb-3 fs-20">Billing Address</h3>
                                @include('includes.validation-form')
                                <x-user-info :countries="$countries" />
                                <div class="row mb-3">
                                    <div class="offset-md-3 col-md-8">
                                        <label for="isRemember">
                                            <input type="checkbox" name="isRemember" id="isRemember"> Remember Address
                                        </label>
                                        <input type="hidden" value="{{ isset($orderId) ? $orderId : 0 }}" />
                                        <button type="submit" class="btn btn-primary float-end">Continue</button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="checkout-card">
                        <div class="checkout-card-body">
                            <h3 class="mb-3 fs-20">Order Details</h3>
                            <x-products-table locale="checkout" :instance="'default'" />
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end checkout-wrap -->
    </div><!-- end container -->
</x-guest-layout>
