<x-app-layout :page-title="$product->name">
    <div class="row">
        <div class="col-4 card">
            <div class="card-body">
                <img id="main-image" src="{{asset($product->images->first()->path)}}" class="img-fluid d-block mx-auto border" alt="{{$product->name}}_1">
                <div class="d-flex justify-content-around">
                    @foreach ($product->images as $key => $image)
                        <a href="javascript:;" onclick="changeMainImage(this)" class="text-decoration-none border">
                            <img src="{{asset($image->path)}}" class="img-fluid product-small-images" alt="{{$product->name}}_{{++$key}}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6 card">
            <div class="card-body">
                <h1>
                    {{$product->name}}
                </h1>
                <h4 class="text-warning">
                    ${{$product->price}}
                </h4>
                <h4>
                    @if ($product->qty)
                        <span class="badge badge-lg bg-success text-light rounded-pill">On Stock: {{$product->qty}}</span>
                    @else
                        <span class="badge badge-lg bg-danger text-light rounded-pill">Out of Stock</span>
                    @endif
                </h4>
                <p>
                    {{$product->desc}}
                </p>
            </div>
        </div>
        <div class="col-md-2 border p-3">
            <span class="text-warning">${{$product->price}}</span>
            <br>
            <div class="small">Details...</div>
            <div class="small">Details...</div>
            <div class="small">Details...</div>
            <div class="small">Details...</div>
            <div class="small">Details...</div>
            <div class="small">Details...</div>
            @if (session('message'))
                <div class="text-success">
                    {{session('message')}}
                </div>
            @endif
            <form action="{{route('cart.store')}}" method="post" class="my-3">
                @csrf
                <input type="hidden" name="id_product" value="{{$product->id}}">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn pill rounded-pill btn-yellow" {{ $product->qty < 1 ? 'disabled' : null }}>Add to Cart</button>
                    <button type="submit" formaction="{{route('cart.buy.now')}}" class="btn pill rounded-pill btn-warning" {{ $product->qty < 1 ? 'disabled' : null }}>Buy Now</button>
                </div>
            </form>
            <div class="small">Details...</div>
            <div class="small">Details...</div>
        </div>
    </div>
    <div class="related-products"></div>
    <div class="clients-comments"></div>
</x-app-layout>