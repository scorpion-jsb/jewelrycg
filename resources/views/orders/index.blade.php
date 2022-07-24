<x-app-layout page-title="My Orders">
    <div class="p-3">
        <div class="card ">
            <div class="card-body">
                <x-orders-table :orders="$orders"/>
            </div>
        </div>        
        <div class="text-center">
            {{$orders->links()}}
        </div>    
    </div>
</x-app-layout>