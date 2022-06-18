@foreach ($products->chunk(4) as $products_chunk)
    <div class="row justify-content-around mb-4">
        @foreach ($products_chunk as $product)
            <div class="product-block col-12 col-sm-6 col-md-2 border border-secondary border-5">
                <a href="{{route('products.show', $product->id)}}" class="text-decoration-none d-inline-block link-dark h-100 w-100">
                    <img src="{{asset($product->images->first()->path)}}" class="img-fluid d-block mx-auto mt-3" alt="{{$product->name}}">
                    <div class="text-center mt-3">
                        {{$product->name}}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endforeach