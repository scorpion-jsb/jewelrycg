<table class="table">
    <thead>
        <tr>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $product)
            <tr>
                <td><a href="{{route('product.page', $product->id)}}" class="link-dark">{{$product->name}}</a></td>
                <td>${{number_format($product->price, 2)}}</td>
                <td>
                    @if ($locale == 'cart')
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
                                <?php $out_of_stock[$key] = $product->qty > $product->model->qty ?>
                                @if ($out_of_stock[$key])
                                    <div class="col-2">
                                        <span class="badge rounded-pill text-light bg-danger">
                                            In Stock: {{ $product->model->qty }}
                                        </span>
                                    </div>
                                @endif
                                @csrf
                                @method('patch')    
                                <input type="hidden" name="row_id" value="{{$product->rowId}}">
                                <span class="col-7" align="end">
                                    <button type="submit" class="btn btn-outline-primary" title="Edit quantity"><i class="fas fa-edit"></i></button>
                                    <button formaction="{{route('cart.remove.product')}}" type="submit" class="btn btn-outline-danger" title="Remove from chart"><i class="fa-solid fa-x"></i></button>
                                </span>        
                            </div>
                        </form>    
                    @else
                        {{$product->qty}}
                    @endif
                </td>
            </tr>
        @endforeach
        @if ($locale != 'orders.show')
            <tr>
                <th scope="row">Total:</th>
                <td {{ $locale == 'checkout' || $products->count() == 0 ? 'colspan=2' : null  }}>${{Cart::total()}}</td>
                @if ($locale == 'cart' && $products->count() > 0)
                    <td align="end">
                        <a href="{{route('checkout.index')}}"
                            class="btn btn-outline-success {{ isset($out_of_stock) && in_array(true, $out_of_stock) ? 'disabled' : null }}"
                        >
                            Proceed to Checkout
                        </a>
                    </td>
                @endif
            </tr>
        @endif
    </tbody>
</table>
