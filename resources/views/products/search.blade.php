<x-app-layout page-title="Searching for {{request()->q ?? request()->category}}">
    <x-products-display :products="$products"/>
</x-app-layout>
