<x-app-layout :page-title="'Order '.$order->id">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Order Info</h5>
                    <hr>
                    @include('includes.validation-form')
                    <x-order-info :order="$order" :edit="$edit"/>
                    @if (auth()->user()->is_admin && !$edit)
                        <form action="{{route('orders.show', $order->id)}}" method="get" class="text-center">
                            <input type="hidden" name="edit" value="1" id="edit">
                            <button type="submit" class="btn btn-info text-light">
                                Edit
                            </button>
                        </form>
                    @endif
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