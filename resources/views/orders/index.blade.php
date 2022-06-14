<x-app-layout page-title="My Orders">
    <div class="card">
        <div class="card-body">
            <x-orders-table :orders="$orders"/>
        </div>
    </div>        
</x-app-layout>