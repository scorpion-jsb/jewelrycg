<x-app-layout page-title="My Orders">
<div class="container">
    <div class="col-lg-8 col-md-10 py-8 mx-auto checkout-wrap">
        <h1 class="fw-800">Thanks for shopping with us!</h1>
        <p>We appreciate your order, we’re currently processing it. So hang tight, and we’ll send you confirmation very soon!</p>

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
    </div>
</div>
</x-app-layout>
