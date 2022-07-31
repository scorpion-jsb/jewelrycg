<x-app-layout page-title="3D Models">
<section class="hero-home py-9">
<!--
    <div class="hero-media" id="hero-media">
      <video class="hero-media-asset is-visible" autoplay="" muted="" loop="" playsinline="" data-hero-video="" data-src-lg="https://cdn.dribbble.com/uploads/39417/original/49dbf46eae15d227fc95a69cee31251e.mp4?1657824906" data-src-sm="https://cdn.dribbble.com/uploads/39418/original/0cc960a3bf612d0badc4f6165eb36f7b.mp4?1657824915">
        <source src="https://cdn.dribbble.com/uploads/39417/original/49dbf46eae15d227fc95a69cee31251e.mp4?1657824906" type="video/mp4">
      </video>
    </div>
    -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 hero-content-container">
                <div class="hero-categories filter-categories pb-4">
                    <ul class="mb-3">
                    <li class="category active"><a href="#">Explore</a></li>
                    @foreach (\App\Models\ProductsCategorie::all() as $category)
                        <li class="category"><a href="#">{{$category->category_name}}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div> 
            <div class="col-lg-6 mx-auto text-center hero-content-container">
                <h4 class="fs-20 text-white pb-4 mb-0">The world's preferred source for Jewelry CG content</h4>
                <h1 class="text-white font-weight-bold pb-4 mb-0">Explore our vast collections of 3D models</h1>
                <div class="search-form ml-auto mr-auto py-2">
                    <form method="get" action="{{route('search')}}">
                        <div class="search-col">
                            <input name="q" type="search" placeholder="Search" aria-label="Search" class="search-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<main class="py-6">
    <div class="container">
        {{-- if no_results --}}
            <!--<p>Aw snap! There's no products that match your filters.</p>-->
        {{-- /if --}}

        <x-products-display :products="$products"/>
        
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
