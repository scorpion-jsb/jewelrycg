<x-app-layout page-title="Add New Product">
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="card col-md-6">
                <div class="card-body row">
                    @include('includes.validation-form')
                    <x-product-form/>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>