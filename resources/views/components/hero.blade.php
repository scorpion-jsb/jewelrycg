<div>
    <section class="hero-home pt-9 pb-6">
        <div class="container">
            <div class="row">
                <div class="col-12 hero-content-container">
                    <div class="hero-categories filter-categories pb-4">
                        <ul class="mb-3 category-container">
                            <li class="category active" data-category="all"><a href="#">Explore</a></li>
                            @foreach (\App\Models\ProductsCategorie::all() as $category)
                                <li class="category" data-category="{{ $category->category_name }}"><a
                                        href="#">{{ $category->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 mx-auto hero-content-container">
                    <h4 class="fs-20 pb-4 mb-0">The world's preferred source for Jewelry CG content</h4>
                    <h1 class="font-weight-bold pb-4 mb-0">Explore our vast collections of 3D models</h1>
                    <div class="search-form ml-auto mr-auto py-2">
                        <form method="get" action="{{ route('search') }}">
                            <div class="search-col">
                                <input type="hidden" value="all" id="category_id" name="category">
                                <input name="q" type="search" placeholder="Search" aria-label="Search"
                                    id="search" class="search-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="py-6">
        <div class="container product-container">
            <x-products-display :products="$products" />
        </div>
    </main>

    <script>
    
    </script>
</div>
