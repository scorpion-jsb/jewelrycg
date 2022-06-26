@extends('backend.dashboard.layouts.app', ['activePage' => 'products', 'title' => 'All Products', 'navName' => 'Table List', 'activeButton' => 'catalogue'])

@section('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Products</h4>
                                    <p class="card-category">Manage products</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('backend.products.create') }}" class="btn btn-info pull-right"> Add
                                        Product </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <div class="col-md-12">
                                <table class="table table-hover table-striped ">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        
                                            @foreach ($products as $product)
                                            <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }} $</td>
                                            <td>{{ $product->qty }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>
                                                <a target="_blank" href="{{ route('products.show', $product->id) }}" class="btn btn-white btn-sm" 
                                                    >
                                                    <i class="bi-eye me-1"></i> Preview
                                                </a>
                                                <a href="{{ route('backend.products.edit', $product->id) }}" class="btn btn-white btn-sm" 
                                                    >
                                                    <i class="bi-pencil-fill me-1"></i> Edit
                                                </a>
                                            </td>
                                            </tr>
                                            @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


@endsection

@section('js_content')
    <script>
        $(function() {

            $('.table').DataTable({
                processing: true,
                serverSide: true,
                bAutoWidth: false,

                ajax: '{{ route('backend.products.get') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'qty',
                        name: 'qty'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
