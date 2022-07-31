@foreach ($products as $key => $product)
<div class="cart-item">
    <div class="row">
        <div class="col-2">
            <img src="{{ asset('uploads/all/' . $product->model->uploads->file_name) }}" alt="" class="thumbnail border rounded w-100">
        </div>
        <div class="col-8">
            <div class="item-meta mb-2">
            @php
                if (count($product->options)) {
                    echo $product->name . ' - ' . $product->options->name;
                } else {
                    echo $product->name;
                }
            @endphp
            </div>
            <div class="item-meta mb-2">Quanity {{ $product->qty }}</div>
        </div>
        <div class="col-2">
            <span class="text-primary fw-800">${{ $product->price }}</span>
        </div>
    </div>  
</div>
@endforeach
