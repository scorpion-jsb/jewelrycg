<div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-4 row-cols-2">
@foreach ($products->chunk(4) as $products_chunk)
    @foreach ($products_chunk as $product)
    <div class="col">
        <a class="card hov-shadow-sm mt-1 mb-2 has-transition bg-white p-2" href="{{route('products.show', $product->slug)}}">
            <div class="w-100 mb-2 pb-3 border-bottom">
                @if($product->uploads->file_name == 'none.png')
                    <img src="{{ asset('assets/img/placeholder.jpg') }}" alt="{{ $product->name }}" class="rounded-sm w-100 lazyloaded">
                @else
                    <img src="{{ asset('uploads/all') }}/{{$product->uploads->file_name}}" alt="{{ $product->name }}" class="rounded-sm w-100 lazyloaded">
                @endif
            </div>
            <div class="text-left px-2">
                <div class="fs-15">
                    <div class="fw-700 text-primary">${{$product->price}} </div>
                </div>
                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px text-black">
                    {{$product->name}}
                </h3>
            </div>
        </a>
    </div>
    @endforeach
@endforeach
</div>
