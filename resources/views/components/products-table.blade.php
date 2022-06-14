<table class="table">
    <thead>
        <tr>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td><a href="{{route('product.page', $product->id)}}" class="link-dark">{{$product->name}}</a></td>
                <td>${{number_format($product->price, 2)}}</td>
                <td>
                    @if ($locale != 'cart')
                        {{$product->qty}}
                    @else
                        <form action="{{route('cart.edit.qty')}}" method="post">
                            <div class="row justify-content-between">
                                <div class="col-2">
                                    <input type="number"
                                        value="{{$product->qty}}"
                                        placeholder="{{$product->qty}}"
                                        name="qty"
                                        min="1"
                                        max="100"
                                        class="form-control"
                                    >
                                </div>
                                @csrf
                                @method('patch')    
                                <input type="hidden" name="row_id" value="{{$product->rowId}}">
                                <span class="col-9" align="end">
                                    <button type="submit" class="btn btn-outline-primary" title="Edit quantity"><i class="fas fa-edit"></i></button>
                                    <button formaction="{{route('cart.remove.product')}}" type="submit" class="btn btn-outline-danger" title="Remove from chart"><i class="fa-solid fa-x"></i></button>
                                </span>        
                            </div>
                        </form>    
                    @endif
                </td>
            </tr>
        @endforeach
        @if ($locale != 'orders.show')
            <tr>
                <th scope="row">Total:</th>
                <td {{ $locale == 'checkout' || $products->count() == 0 ? 'colspan=2' : null  }}>${{Cart::total()}}</td>
                @if ($locale == 'cart' && $products->count() > 0)
                    <td align="end"><a href="{{route('checkout.index')}}" class="btn btn-outline-success">Proceed to Checkout</a></td>
                @endif
            </tr>
        @endif
    </tbody>
</table>
