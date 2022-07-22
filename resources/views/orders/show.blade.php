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
                        <x-products-table locale="orders.show" :products="$order->items" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
