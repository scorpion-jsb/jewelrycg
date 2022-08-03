<x-app-layout page-title="3D Models">
<section class="hero-home pt-9 pb-6">
    <div class="container">
        <div class="row">
            <div class="col-12 hero-content-container">
                <div class="hero-categories filter-categories pb-4">
                    <ul class="mb-3">
                    <li class="category active"><a href="#">Explore</a></li>
                    @foreach (\App\Models\ProductsCategorie::all() as $category)
                        <li class="category"><a href="#">{{$category->category_name}}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div> 
            <div class="col-lg-6 mx-auto hero-content-container">
                <h4 class="fs-20 pb-4 mb-0">The world's preferred source for Jewelry CG content</h4>
                <h1 class="font-weight-bold pb-4 mb-0">Explore our vast collections of 3D models</h1>
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
