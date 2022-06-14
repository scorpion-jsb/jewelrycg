<table class="table">
    <thead>
        <tr>
            <th scope="col">Status</th>
            <th scope="col">Tracking Number</th>
            <th scope="col">Message</th>
            <th scope="col">Products</th>
            <th scope="col">Total</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{$order->status}}</td>
                <td><a href="javascript:;" onclick="copyText(this)" class="link-secondary">{{$order->tracking_number}}</a></td>
                <td>{{$order->message}}</td>
                <td>{{$order->items_count}}</td>
                <td>${{$order->total_price}}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('orders.show', $order->id)}}" class="btn btn-primary">Details</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>