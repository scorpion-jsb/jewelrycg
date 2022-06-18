<x-app-layout page-title="Searching for {{request()->q ?? request()->category}}">
    <x-products-display :products="$products"/>
    <div class="mt-3 text-center">
        {{ $products->links() }}
    </div>
</x-app-layout>