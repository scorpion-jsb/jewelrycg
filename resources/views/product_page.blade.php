<x-app-layout :page-title="$product->name">
    <div class="row">
        <div class="col-4">
            <img src="{{asset($product->images->first()->path)}}" class="img-fluid d-block mx-auto" alt="{{$product->name}}_1">
            <div class="mt-2 d-flex justify-content-around">
                @foreach ($product->images as $key => $image)
                    <a href="{{asset($image->path)}}" target="_blank" class="text-decoration-none">
                        <img src="{{asset($image->path)}}" class="img-fluid product-small-images" alt="{{$product->name}}_{{++$key}}">
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <h1>
                {{$product->name}}
            </h1>
            <h4 class="text-warning">
                ${{$product->price}}
            </h4>
            <p>
                {{$product->desc}}
            </p>
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
                    <button type="submit" class="btn pill rounded-pill btn-yellow">Add to Cart</button>
                    <button type="submit" formaction="#" class="btn pill rounded-pill btn-warning">Buy Now</button>
                </div>
            </form>
            <div class="small">Details...</div>
            <div class="small">Details...</div>
        </div>
    </div>
    <div class="related-products"></div>
    <div class="clients-comments"></div>
</x-app-layout>