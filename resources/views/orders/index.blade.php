<x-app-layout page-title="My Orders">
    <div class="card">
        <div class="card-body">
            <x-orders-table :orders="$orders"/>
        </div>
    </div>        
    <div class="text-center">
        {{$orders->links()}}
    </div>
</x-app-layout>