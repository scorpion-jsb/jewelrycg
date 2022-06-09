<x-app-layout page-title="Cart">
    <div class="card">
        @if (session('message'))
            <h4 class="text-center text-danger mt-3">
                {{session('message')}}
            </h4>
        @endif
        <div class="card-body">
            <x-cart-table/>
        </div>
    </div>        
</x-app-layout>