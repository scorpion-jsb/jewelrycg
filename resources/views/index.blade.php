<section class="hero-content-container py-8">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
                <h4 class="fs-20 text-black mb-4">The world's preferred source for {{ app_name() }} content</h4>
				<h1 class="text-black font-weight-bold mb-4">Explore our vast collections of {{ app_name() }} models</h1>
            </div>
			<div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
		</div>
	</div>
</section>

<x-app-layout>
    <div class="row justify-content-center">
        <h2 class="col-md-3 text-center">
            Today's Deals
            <hr>
        </h2>
    </div>
    <x-products-display :products="$products"/>
</x-app-layout>
