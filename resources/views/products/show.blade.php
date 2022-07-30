<x-app-layout :page-title="$product->name">
    <section class="product_detail_single">
        <div class="container">
            <div class="product-container col-lg-8 col-md-10 py-6 mx-auto checkout-wrap">
                <div class="product-details-title mb-4 px-6 row">
                    <div class="col-lg-8">
                        <h1 class="fs-20 fw-600">{{$product->name}}</h1>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-details-price mb-4">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="fs-20 fw-400 text-primary text-right" id="product_price">
                                            @if (count($variants))
                                                ${{ $minPrice }} ~ ${{ $maxPrice }}
                                            @else
                                                ${{ $product->price }}                                            
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    @auth
                                        @if ($wishlist_product = Cart::instance('wishlist')->content()->firstWhere('id', $product->id))
                                            <form action="{{route('cart.wishlist')}}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <input type="hidden" name="row_id" value="{{$wishlist_product->rowId}}">
                                                <button type="submit" class="badge badge-lg bg-danger-1 border border-danger-1 text-light rounded-pill" style="border: 1px solid grey !important;color: black !important;">
                                                    <i class="fa-solid fa-x"></i>
                                                    Remove from Saved
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{route('cart.wishlist')}}" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id_product" value="{{$product->id}}">
                                                <button type="submit" class="badge badge-lg bg-primary border border-primary text-light rounded-pill">
                                                    <i class="fa-regular fa-heart"></i>
                                                    Save
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($product->modelpreview->file_name != 'none.png')
                <div class="product-3dmodel bg-white mb-4">
                    <div class="model-box border rounded h-500px p-2">
                        <model-viewer class="model-full-hw" alt="This is CAD Preview" src="{{asset('uploads/all/')}}/{{$product->modelpreview->file_name}}" ar-scale="auto" poster="assets/img/placeholder.jpg" loading="lazy" ar ar-modes="webxr scene-viewer quick-look" shadow-intensity="0" camera-controls auto-rotate></model-viewer>
                    </div>
                </div>
                @endif
                <!-- Product Images/Preview -->
                <div class="product-gallery-thumb row mb-2">
                @foreach ($uploads as $key => $image)
                    @if ($key < 3)
                        <div class="carousel-box c-pointer col-6 col-lg-6 mb-3">
                            <img src="{{asset('uploads/all/')}}/{{$image->file_name}}" class="mw-100 mx-auto border" alt="{{$key}}">
                        </div>
                    @endif
                @endforeach
                </div>

                <div class="row">
                    <!-- Product Images/Preview -->
                    <div class="col-xl-6 col-lg-6"> 
                        <div class="bg-white d-block">
                            @if($product->modelpreview->file_name != 'none.png')
                            <div class="product-gallery bg-white mb-4">
                                <div class="model-box border h-500px p-2">
                                    <model-viewer class="model-full-hw" alt="This is CAD Preview" src="{{asset('uploads/all/')}}/{{$product->modelpreview->file_name}}" ar-scale="auto" poster="assets/img/placeholder.jpg" loading="lazy" ar ar-modes="webxr scene-viewer quick-look" shadow-intensity="0" camera-controls auto-rotate></model-viewer>
                                </div>
                            </div>
                            @endif
                            <div class="product-gallery-thumb row mb-2">
                            @foreach ($uploads as $key => $image)
                                @if ($key < 3)
                                    <div class="carousel-box c-pointer col-6 col-lg-6 mb-3">
                                        <img src="{{asset('uploads/all/')}}/{{$image->file_name}}" class="mw-100 mx-auto border" alt="{{$key}}">
                                    </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Product Details/Title -->
                    <div class="col-xl-6 col-lg-6"> 
                        <div class="bg-white p-3 mb-0">
                            <div class="product-details-title mb-3">
                                <h1 class="mb-2 fs-30 fw-400">{{$product->name}}</h1>
                            </div>
                            <div class="product-details-misc border-bottom pb-2 mb-4">
                                <div class="col-6 text-left">
                                    <ul class="list-inline social fw-600 mb-0">
                                        <li class="list-inline-item"> 
                                            <a target="_self" href="mailto:?subject={{$product->name}}&amp;body=#" class="jssocials-share-link text-black fs-18">
                                                <i class="bi bi-envelope fs-20"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item"> 
                                            <a target="_blank" href="https://twitter.com/share?url=#&amp;text={{$product->name}}" class="jssocials-share-link text-black fs-18">
                                            <i class="bi bi-twitter fs-20"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item"> 
                                            <a target="_blank" href="https://facebook.com/sharer/sharer.php?u=#" class="jssocials-share-link text-black fs-18">
                                            <i class="bi bi-facebook fs-20"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item"> 
                                            <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=#" class="jssocials-share-link text-black fs-18">
                                            <i class="bi bi-linkedin fs-20"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item"> 
                                            <a target="_self" href="whatsapp://send?text=#" class="jssocials-share-link text-black fs-18">
                                            <i class="bi bi-whatsapp fs-20"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                                
                            <div class="product-details-misc mb-4">
                                {{$product->description}}
                            </div>

                            @if ($product->is_backorder)
                                <div class="alert alert-info mt-2" role="alert">
                                    This product is available on backorder and will be shipped when back in stock.
                                </div>
                            @endif

                            @if ($product->is_madetoorder)
                                <div class="alert alert-info mt-2" role="alert">
                                    This product is made to order.
                                </div>
                            @endif

                            <div class="product-details-price mb-4">
                                <div class="w-100">
                                    <div class="opacity-50 my-2">Price:</div>
                                </div>
                                <div class="w-100">
                                    <div class="">
                                        <strong class="h2 fw-400 text-black" id="product_price">
                                            @if (count($variants))
                                                ${{ $minPrice }} ~ ${{ $maxPrice }}
                                            @else
                                                ${{ $product->price }}                                            
                                            @endif
                                        </strong>
                                    </div>
                                </div>
                            </div>

                            <div class="product-details-misc mb-4">
                                @if (session('wishlist-message'))
                                    <h4 class="text-center text-success">
                                        {{session('wishlist-message')}}
                                    </h4>
                                @endif
                                <h4>
                                    @auth
                                        @if ($wishlist_product = Cart::instance('wishlist')->content()->firstWhere('id', $product->id))
                                            <form action="{{route('cart.wishlist')}}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <input type="hidden" name="row_id" value="{{$wishlist_product->rowId}}">
                                                <button type="submit" class="badge badge-lg bg-danger-1 border border-danger-1 text-light rounded-pill" style="border: 1px solid grey !important;color: black !important;">
                                                    <i class="fa-solid fa-x"></i>
                                                    <small>Remove from Wishlist</small>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{route('cart.wishlist')}}" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id_product" value="{{$product->id}}">
                                                <button type="submit" class="badge badge-lg bg-primary border border-primary text-light rounded-pill">
                                                    <i class="fa-regular fa-heart"></i>
                                                    <small>Add To Wishlist</small>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                    @if ($product->is_trackingquantity)
                                        @if ($product->quantity)
                                            <span class="badge badge-lg bg-success text-light rounded-pill"><small>On Stock: {{$product->quantity}}</small></span>
                                        @else
                                            <span class="badge badge-lg bg-danger text-light rounded-pill"><small>Out of Stock</small></span>
                                        @endif
                                    @endif
                                </h4>
                            </div>

                            {{-- if {sc:cart:alreadyExists :product="id"} == true --}}
                            <!--
                            <div class="border-t border-gray-200 py-4 flex justify-between items-center">
                                <span class="font-medium">This product is already in your cart.</span>

                                <a class="bg-green-100 hover:opacity-75 text-gray-700 font-semibold rounded-lg px-4 py-2" href="/cart">
                                    View Cart
                                </a>
                            </div>
                            -->
                            {{-- else --}} 

                            @if (session('message'))
                                <div class="text-success">
                                    {{session('message')}}
                                </div>
                            @endif
                            <form action="{{route('cart.store')}}" method="post" class="my-3" name="cart_star_form">
                                @csrf

                                <input type="hidden" name="variant_attribute_value" id="variant_attribute_value" value="0">
                                @if (count($variants) > 0)
                                    <div class="border-bottom variant-group" >
                                        @foreach ($product->attribute() as $attribute)
                                            <div class="form-group" style="margin-bottom: 8px">
                                                <label for="" class="control-label col-md-2">{{ $attribute->name }}</label>
                                                <div class="col-md-10">
                                                    <div class="btn-group" data-toggle="buttons" id="variants_group">
                                                        @foreach ($product->attributeValue($attribute->id) as $attributeValue)
                                                            <label class="btn btn-default btn-sm" style="border: 1px solid grey">
                                                                <input type="radio" id="attribute{{ $attribute->id }}" name="attribute{{ $attribute->id }}"  class="sm attribute-radio attribute{{ $attribute->id }}" value="{{ $attributeValue->id }}" > {{ $attributeValue->name }}
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <input type="hidden" name="id_product" value="{{$product->id}}">
                                <button type="submit" class="btn btn-primary shadow-md" {{ ($product->is_trackingquantity == 1 && $product->quantity < 1) || count($variants) > 0 ? 'disabled' : null }} id="add_to_cart_btn">Add to Cart</button>
                                <button type="submit" formaction="{{route('cart.buy.now')}}" class="btn btn-success shadow-md" {{ $product->is_trackingquantity == 1 &&  $product->quantity < 1 || count($variants) > 0 ? 'disabled' : null }} id="buy_now_btn">Buy Now</button>
                            </form>

                        </div><!--End .bg-white product card-->
                        <div class="show-model-specs">
                        <div class="show-specs-btn d-none d-lg-block mb-3 text-uppercase fw-700 border p-3">Metal Weight</div>
                        <a class="show-specs-btn d-lg-none mb-4 pb-2 d-block text-uppercase fw-700 card p-3" data-toggle="collapse" href="#showGold" role="button" aria-expanded="false" aria-controls="showGold">Metal Weight <span class="las la-angle-down"></span></a>
                        </div>

                        <div class="collapse multi-collapse d-lg-block" id="showGold">
                            <div class="row">
                                {{-- if 10k_gold --}}
                                <div class="col-lg-4 col-6">
                                    <div class="border p-3 item-value-card mb-3">
                                        <div class="item-value-card-body">
                                            <div class="value-title pb-2 mb-2 text-uppercase fw-700">10k</div>
                                            <div class="py-1">
                                                <span class="value-price">$726</span>
                                                <span class="value-price-change">2.79</span>
                                            </div>
                                            <div class="py-1 fw-700 fs-24">55 Grams</div>
                                            <div class="py-1 fw-700 fs-14">2.43 DWT</div>
                                        </div>
                                    </div>
                                </div>
                                {{-- /if --}}
                                <div class="col-lg-4 col-6">
                                    <div class="border p-3 item-value-card mb-3">
                                        <div class="item-value-card-body">
                                            <div class="value-title pb-2 mb-2 text-uppercase fw-700">14k</div>
                                            <div class="py-1">
                                                <span class="value-price">$726</span>
                                                <span class="value-price-change">2.79</span>
                                            </div>
                                            <div class="py-1 fw-700 fs-24">55 Grams</div>
                                            <div class="py-1 fw-700 fs-14">2.43 DWT</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="border p-3 item-value-card mb-3">
                                        <div class="item-value-card-body">
                                            <div class="value-title pb-2 mb-2 text-uppercase fw-700">18k</div>
                                            <div class="py-1">
                                                <span class="value-price">$726</span>
                                                <span class="value-price-change">2.79</span>
                                            </div>
                                            <div class="py-1 fw-700 fs-24">55 Grams</div>
                                            <div class="py-1 fw-700 fs-14">2.43 DWT</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--End showGold-->
                    </div><!--End col-6 -->
                </div>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    <script>

        var variants = [];

        @foreach ($variants as $variant)
            var ids = '{{ $variant->variant_attribute_value }}';
            ids = ids.split(',');

            variants.push({id: ids.sort().join(','), price: '{{ $variant->variant_price }}'})
        @endforeach

        $('.attribute-radio').click(function () {
            var variantAttributeValue = [];
            var varaintAttributeCount = 0;

            $('.variant-group').find('div.form-group').each(function (i, div) {
                var name = $(div).find('input').attr('name')
                var value = document.cart_star_form[name].value
                varaintAttributeCount++;

                if (value)
                    variantAttributeValue.push(value)
            })

            if (variantAttributeValue.length == varaintAttributeCount) {
                $('#buy_now_btn, #add_to_cart_btn').removeAttr('disabled');
            }

            variants.forEach(function (variant) {
                if (variant.id == variantAttributeValue.sort().join(',')) {
                    $('#variant_attribute_value').val(variant.id)
                    $('#product_price').text('$' + variant.price / 100)
                }
            })
        })
    </script>
</x-app-layout>
