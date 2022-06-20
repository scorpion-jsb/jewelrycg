<x-app-layout>
    <div class="row justify-content-center">
        <h2 class="col-md-3 text-center">
            Today's Deals
            <hr>
        </h2>
    </div>
    <x-products-display :products="$products"/>
</x-app-layout>