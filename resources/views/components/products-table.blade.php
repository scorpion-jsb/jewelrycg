<div class="product-container">
    @foreach ($products as $key => $product)
        <div class="cart-item mb-3 product-item">
            <div class="row">
                <div class="col-lg-2 col-4">
                    <img src="{{ $product->model->uploads->getImageOptimizedFullName(250) }}" alt="" class="thumbnail border rounded w-100">
                </div>
                <div class="col-lg-10 col-8">
                    <div class="item-meta mb-3 fw-800 fs-18">
                        @php
                            if (count($product->options)) {
                                echo $product->name . ' - ' . $product->options->name;
                            } else {
                                echo $product->name;
                            }
                        @endphp
                    </div>
                    <div class="item-meta mb-2">
                        <span class="text-primary fw-800 mb-2" id="price{{ $product->rowId }}">${{ $product->price }}</span>
                    </div>
                    <div class="item-meta mb-2 row align-items-baseline">
                        <div class="col-auto">
                            <span class="fw-800">Quantity:</span> 
                        </div>
                        <div class="col-auto">
                            @if ($locale == 'cart')
                            <input type="number" value="{{ $product->qty }}" placeholder="{{ $product->qty }}" name="quantity" min="1" max="100" class="form-control quantity" data-id="{{ $product->rowId }}" data-price="{{ $product->price }}" id="{{ $product->rowId }} inlineFormInputGroup">
                                <?php $out_of_stock[$key] = $product->qty > $product->model->quantity && $product->model->is_trackingquantity; ?>
                                @if ($out_of_stock[$key])
                                    <div class="col-2">
                                        <span class="badge rounded-pill text-light bg-danger">
                                            In Stock: {{ $product->model->quantity }}
                                        </span>
                                    </div>
                                @endif
                                @csrf
                            @else
                                {{ $product->qty }}
                            @endif
                        </div>
                    </div>
                    <div class="item-meta mb-2">
                        <div class="text-left">
                            <a href="{{ url('cart/remove') . '/' . $product->rowId }}" class="text-danger" title="Remove from chart">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    <div class="col-auto ml-auto">
        Total: 
        @if ($locale == 'cart')
            <span class="total-price">
                ${{ Cart::total() }}
            </span>
        @else
            <span class="total-price">
                ${{ number_format(Cart::total() + $shippingPrice / 100 + $taxPrice / 10000, 2) }}
            </span>
        @endif
        @if ($locale == 'cart' && $products->count() > 0)
                <a href="{{ route('checkout.index') }}"
                    class="btn btn-success float-right {{ isset($out_of_stock) && in_array(true, $out_of_stock) ? 'disabled' : null }}">Proceed
                    to Checkout</a>
        @endif

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    $('.quantity').change(function() {
        // var price = $(this).parents('td').prev().text().split('$')[1]
        var quantity = $(this).val();
        var rowId = $(this).attr('data-id');
        var price = $(this).attr('data-price');
        var total = price * quantity

        // $(this).parents('td').next().find('div').text('$' + (Math.round(total * 100) / 100).toFixed(2));
        // var rowId = $(this).attr('id');

        $.ajax({
            method: 'post',
            url: "{{ route('cart.edit.qty') }}",
            data: {
                row_id: rowId,
                quantity: quantity
            },
            success: function(data) {
                total = 0;
                // $('tbody').find('tr').each(function() {
                //     if ($(this).attr('id') != 'total') {
                //         var price = $(this).find('div').text().split('$')[1];
                //         var quantity = $(this).find('input').val()

                //         total += price * quantity;
                //     }
                // })

                // $('#total_td').find('div').text('$' + (Math.round(total * 100) / 100).toFixed(2));

                $('.product-container').find('div.product-item').each(function () {
                    var price = $(this).find('input.quantity').attr('data-price');
                    var quantity = $(this).find('input.quantity').val();

                    total += price * quantity;
                });

                $('span.total-price').text('$' + (Math.round(total * 100) / 100).toFixed(2));
            }
        })

    })
</script>
