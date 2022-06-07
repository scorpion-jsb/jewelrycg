<x-app-layout>
    @foreach ($products->chunk(4) as $products_chunk)
        <div class="row justify-content-around mb-4">
            @foreach ($products_chunk as $product)
                <div class="product-block col-12 col-sm-6 col-md-2 border border-secondary border-5">
                    <a href="{{route('product.page', $product->id)}}" class="text-decoration-none link-dark">
                        <img src="{{asset($product->images->first()->path)}}" class="img-fluid d-block mx-auto mt-3" alt="{{$product->name}}">
                        <div class="text-center py-2">
                            {{$product->name}}
                            <br>
                            <span class="text-warning">${{$product->price}}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</x-app-layout>