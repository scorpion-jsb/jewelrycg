<x-app-layout page-title="Shopp">
    @foreach ($products->chunk(4) as $products_chunk)
        <div class="row justify-content-around mb-4">
            @foreach ($products_chunk as $product)
                <div class="product-block col-12 col-sm-6 col-md-2 border border-secondary border-5">
                    <a href="#" class="text-decoration-none link-dark">
                        <img src="{{$product->images->first()->path}}" class="img-fluid d-block mx-auto my-3" alt="{{$product->name}}">
                        <div class="text-center py-3">
                            {{$product->name}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</x-app-layout>