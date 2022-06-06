<x-app-layout page-title="Cart">
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                        <tr>
                            <td><a href="{{route('product.page', $product->id)}}" class="link-dark">{{$product->name}}</a></td>
                            <td>{{$product->price}}</td>
                            <td>
                                <form action="{{route('cart.edit.qty')}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="row justify-content-between">
                                        <div class="col-3">
                                            <input type="number"
                                                value="{{$product->qty}}"
                                                placeholder="{{$product->qty}}"
                                                name="qty"
                                                min="1"
                                                max="100"
                                                class="form-control"
                                            >
                                        </div>
                                        <input type="hidden" name="row_id" value="{{$product->rowId}}">
                                        <span class="col-9" align="end">
                                            <button type="submit" class="btn btn-outline-primary" title="Edit quantity"><i class="fas fa-edit"></i></button>
                                            <button formaction="{{route('cart.remove.product')}}" type="submit" class="btn btn-outline-danger" title="Remove from chart"><i class="fa-solid fa-x"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th scope="row">Total:</th>
                        <td colspan="2">${{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</td>
                    </tr>
                </tbody>
            </table>
        </div>        
        <div class="offset-md-3 col-md-3 border p-2">
            test
        </div>
    </div>
</x-app-layout>