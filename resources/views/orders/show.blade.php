<x-app-layout :page-title="'Order '.$order->id">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Order Info</h5>
                    <hr>
                    <div>
                        Address:
                        <span class="text-secondary">{{$order->address1}}</span>
                    </div>
                    <div>
                        Secondary Address:
                        <span class="text-secondary">{{$order->address2}}</span>
                    </div>
                    <div>
                        Status:
                        <span class="link-primary">{{$order->status}}</span>
                    </div>
                    <div>
                        Tracking Number:
                        <a href="javascript:;" onclick="copyText(this)" class="link-secondary">{{$order->tracking_number}}</a>
                    </div>
                    @if ($order->message)
                        <div>
                            Message:
                            <span class="link-secondary">{{$order->message}}</span>
                        </div>
                    @endif
                    <div>
                        Total:
                        <span class="link-warning">${{$order->total_price}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Order's Product{{$order->items->count() > 1 ? 's' : null}}</h5>
                    <hr>
                    <x-products-table locale="orders.show" :products="$order->items"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>