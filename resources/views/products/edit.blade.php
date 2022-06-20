<x-app-layout page-title="Edit Product - {{$product->name}}">
    <form action="{{route('products.update', $product)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="card col-md-6">
                <div class="card-body row">
                    @include('includes.validation-form')
                    <x-product-form :product="$product"/>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>