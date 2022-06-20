<div>
    Address:
    <span class="text-secondary">{{$order->address1}}</span>
</div>
<div>
    Secondary Address:
    <span class="text-secondary">{{$order->address2}}</span>
</div>
<form action="{{route('orders.update', $order)}}" method="post">
    @csrf
    @method('patch')
    <div>
        Status:
        <?php $let_edit = auth()->user()->is_admin && $edit ?>
        @if ($let_edit)
            <select name="status" id="status" class="form-select text-primary">
                @foreach (App\Models\Order::$status_list as $status)
                    <option {{ $order->status == $status ? 'selected' : null }}>{{$status}}</option>
                @endforeach
            </select>
        @else
            <span class="link-primary">{{$order->status}}</span>
        @endif
    </div>
    <div>
        Tracking Number:
        <a href="javascript:;" onclick="copyText(this)" class="link-secondary">{{$order->tracking_number}}</a>
    </div>
    @if ($let_edit || $order->message)
        <div>
            Message:
            @if ($edit)
                <input type="text" value="{{old('message') ?? $order->message}}" placeholder="{{$order->message}}" name="message" id="message" class="form-control">
            @else
                <span class="link-secondary">{{$order->message}}</span>
            @endif
        </div>
    @endif
    <div>
        Total:
        <span class="link-warning">${{$order->total_price}}</span>
    </div>
    @if ($let_edit)
        <div class="text-center">
            <button class="btn btn-primary" type="submit">
                Update
            </button>
        </div>
    @endif
</form>
