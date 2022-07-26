<x-app-layout page-title="Shipping Detail">
    <style>
        .tax-radio {
            background-color: #EEEEEE !important;
        }
    </style>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-7">
                <form action="{{ url('/checkout/billing') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom mb-3 fs-3">Tax Options</div>
                            <div class="row mb-3">
                                @foreach ($taxes as $i => $tax)
                                    <div class="offset-md-2 col-md-8 mb-2">
                                        <input type="radio" value="{{ $tax->id }}" class="btn-check"
                                            name="tax_option" id="option{{ $tax->id }}" autocomplete="off"
                                            @if ($i == 0) checked @endif />
                                        <label class="btn btn-default tax-radio" for="option{{ $tax->id }}"
                                            style="width: 100%;">
                                            <span>{{ $tax->name }}</span>
                                            <span class="float-right">${{ $tax->price / 100 }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom mb-3 fs-3">Billing Address</div>
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
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="border-bottom mb-3 fs-3">Order Details</div>
                        <x-products-table locale="checkout" :instance="'default'" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
