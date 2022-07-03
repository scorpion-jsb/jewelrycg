<x-app-layout page-title="3D Models">
<section class="py-8 border-b border-gray-200">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-center text-4xl font-semibold mb-2">Buy Professional 3D models</h2>
    </div>
</section>
<main class="py-6">
    <div class="container">
        {{-- if no_results --}}
            <!--<p>Aw snap! There's no products that match your filters.</p>-->
        {{-- /if --}}

        <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-4 row-cols-2">
            @foreach ($products as $product)
            <div class="col">
                <a class="card hov-shadow-sm mt-1 mb-2 has-transition bg-white p-2" href="{{route('products.show', $product->id)}}">
                    <div class="w-100 mb-2 pb-3 border-bottom">
                        @if($product->uploads->file_name == 'none.png')
                            <img src="{{ asset('assets/img/placeholder-rect.jpg') }}" alt="{{ $product->name }}" class="rounded-sm w-100 lazyloaded">
                        @else
                            <img src="{{ asset('uploads/all') }}/{{$product->uploads->file_name}}" alt="{{ $product->name }}" class="rounded-sm w-100 lazyloaded">
                        @endif
                    </div>
                    <div class="text-left px-2">
                        <div class="fs-15">
                            <span class="fw-700 text-primary">
                                {{ $product->price }}
                            </span>
                        </div>
                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px text-black">
                            {{ $product->name }}
                        </h3>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

     
        <div class="mt-16 mb-6 border-t mx-auto py-8">
            <div class="flex items-center justify-between">
                <div>
                    <a class="bg-green-100 hover:opacity-75 text-gray-700 font-semibold rounded-lg px-4 py-2" href="{{-- prev_page --}}">← Previous</a>
                </div>

                <p class="font-medium">Page 1 of 26</p>
                <div>
                    <a class="bg-green-100 hover:opacity-75 text-gray-700 font-semibold rounded-lg px-4 py-2" href="{{-- next_page --}}">→ Next</a>
                </div>
            </div>
        </div>
    </div>
</main>
                                        
</x-app-layout>
