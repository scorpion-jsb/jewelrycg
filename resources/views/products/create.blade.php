<x-app-layout page-title="Add New Product">
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="card col-md-6">
                <div class="card-body row">
                    @include('includes.validation-form')
                    <div class="col-md-12 mb-2">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="desc">Description:</label>
                        <textarea name="desc" id="desc" value="{{old('desc')}}" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" value="" class="form-control" placeholder="80.00...">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="qty">Quantity in Stock:</label>
                        <input type="number" name="qty" id="qty" value="{{old('qty') ?? 1}}" class="form-control" min="0">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="category">Category:</label>
                        <select name="category" id="category" value="{{old('category')}}" class="form-select">
                            @foreach (App\Models\Product::$category_list as $category)
                                <option>{{$category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="images">Images:</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple>
                    </div>
                    <div class="col-md-12 text-center">
                        <button onclick="changeToCents()" type="submit" class="btn btn-lg btn-outline-success">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>