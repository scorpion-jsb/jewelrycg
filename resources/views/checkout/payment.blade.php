<x-app-layout page-title="Payment">
    <div class="container">
        <form id="payment-form">
            <div class="row m-3">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom mb-3">Payment Information</div>
                            <input type="hidden" name="" value="{{ Session::get('billing_address1') }}" id="address1">
                            <input type="hidden" name="" value="{{ Session::get('billing_address2') }}" id="address2">
                            <input type="hidden" name="" value="{{ Session::get('billing_city') }}" id="city">
                            <input type="hidden" name="" value="{{ Session::get('billing_state') }}" id="state">
                            <input type="hidden" name="" value="{{ Session::get('billing_country') }}" id="country">
                            <input type="hidden" name="" value="{{ Session::get('billing_zipcode') }}" id="zipcode">
                            <input type="hidden" name="" value="{{ Session::get('billing_phonenumber') }}" id="phonenumber">
                            <input type="hidden" name="" value="{{ Auth::user()->email }}" id="email">
                            <input type="hidden" name="" value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" id="name">
                            <div id="payment-element">
                                <!--Stripe.js injects the Payment Element-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom mb-3">Order Details</div>
                            <x-products-table locale="checkout" :instance="isset($buy_now_mode) && $buy_now_mode == 1 ? 'buy_now' : 'default'" />
                            <div class="d-grid gap-2">
                                <button id="submit" class="btn btn-primary">
                                    <div class="spinner hidden" id="spinner"></div>
                                    <span id="button-text">Pay now</span>
                                </button>
                                <div id="payment-message" class="hidden text-center text-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    
    <x-slot:scripts>
        <script src="https://js.stripe.com/v3/"></script>
        <script defer>
            const stripe_key = '{{ config('app.stripe_key') }}';
            const payment_intent_route = '{{ route('checkout.payment.intent') }}';
            const _token = '{{ csrf_token() }}';
            const place_order_route = '{{ route('checkout.store') }}';
            const order_cancel_route = '{{ route('checkout.cancel') }}';
            const finish_page = '{{ route('checkout.finished') }}';
            const buy_now_mode = '{{ $buy_now_mode ?? 0 }}';
        </script>
        <script src="{{ asset('js/checkout.js') }}" defer></script>
        </x-slot>
</x-app-layout>
