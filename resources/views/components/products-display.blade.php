<div class="row row-cols-xxl-5 row-cols-xl-5 row-cols-lg-4 row-cols-md-4 row-cols-2">
@foreach ($products->chunk(4) as $products_chunk)
    @foreach ($products_chunk as $product)
    <div class="col mt-1 mb-2">
        <a href="{{route('products.show', $product->slug)}}">
            <div class="card mb-2">
                <img src="{{ $product->uploads->getImageOptimizedFullName(400) }}" alt="{{ $product->name }}" class="rounded w-100 lazyloaded">
            </div>
            <div class="text-left px-2">
                <div class="fw-700 fs-15 mb-1 text-primary">${{$product->price}} </div>
                <h3 class="fw-600 fs-14 text-truncate-2 lh-1-4 mb-0 h-35px text-black">
                    {{$product->name}}
                </h3>
            </div>
        </a>
    </div>
    @endforeach
@endforeach
</div>
