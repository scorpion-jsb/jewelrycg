<x-app-layout page-title="3D Models">
<section class="py-9 border-b border-gray-200">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-center text-4xl font-semibold mb-2">Buy Professional 3D models</h2>
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
