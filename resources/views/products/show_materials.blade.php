@php
use App\Models\CurrentRate;
$current_rate = CurrentRate::getLastRate();
@endphp

@if (count($arrProductMaterials))
    <!--End .bg-white product card-->
    <div class="show-model-specs">
        <div class="show-specs-btn d-none d-lg-block mb-3 text-uppercase fw-700 border p-3">
            Metal Weight
        </div>
        <a class="show-specs-btn d-lg-none mb-4 pb-2 d-block text-uppercase fw-700 card p-3"
            data-toggle="collapse" href="#showGold" role="button" aria-expanded="false"
            aria-controls="showGold">Metal Weight <span class="las la-angle-down"></span></a>
    </div>

    <div class="collapse multi-collapse d-lg-block" id="showGold">
        <div class="row">
            @foreach ($arrProductMaterials as $product_material)
                @php
                    $type_name = $product_material->material_type_name;
                    $material_weight = $product_material->material_weight;
                    $material_dwt = $material_weight * 0.64301;

                    if ($current_rate == null) {
                        $price = 0;
                        $price_change = 0;
                    } else {
                        if (strpos('24K', $type_name) != -1) {
                            $rate = $current_rate['24k'];
                        } else if (strpos('22K', $type_name) != -1) {
                            $rate = $current_rate['22k'];
                        } else if (strpos('18K', $type_name) != -1) {
                            $rate = $current_rate['18k'];
                        } else if (strpos('14K', $type_name) != -1) {
                            $rate = $current_rate['14k'];
                        } else if (strpos('10K', $type_name) != -1) {
                            $rate = $current_rate['10k'];
                        }

                        $price = number_format($material_weight * $rate, 2, '.', ',');
                    }
                @endphp

                <div class="col-lg-4 col-6">
                    <div class="border p-3 item-value-card mb-3">
                        <div class="item-value-card-body">
                            <div class="value-title pb-2 mb-2 text-uppercase fw-700">
                                {{ $type_name }}
                            </div>
                            <div class="py-1">
                                <span class="value-price">${{ $price }}</span>
                                {{-- <span class="value-price-change">{{ $price_change}}</span> --}}
                            </div>
                            <div class="py-1 fw-700 fs-24">{{ $material_weight }} Grams</div>
                            <div class="py-1 fw-700 fs-14">{{ $material_dwt }} DWT</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif