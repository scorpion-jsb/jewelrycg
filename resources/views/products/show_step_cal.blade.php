@php
use App\Models\CurrentRate;
$current_rate = CurrentRate::getLastRate();
@endphp
<style>
    .cal-select-item.active {
        border: 2px solid blue !important;
    }
</style>
@if (count($arrProductMaterials))
<div class="show-model-specs">
    <div class="show-specs-btn d-none d-lg-block mb-3 text-uppercase fw-700 border p-3">
        COST TO MAKE CALCULATOR
    </div>
    <a class="show-specs-btn d-lg-none mb-4 pb-2 d-block text-uppercase fw-700 card p-3"
        data-toggle="collapse" href="#showGold" role="button" aria-expanded="false"
        aria-controls="showGold">COST TO MAKE CALCULATOR <span class="las la-angle-down"></span></a>
</div>
<div class="card">
    <div class="card-body">
        <div class="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#"
                        aria-expanded="true" aria-controls="">
                        Step1: Select the metal below you want to make this item with.
                    </button>
                </h2>
                <div id="">
                    <div class="accordion-body">
                        <div class="row">
                            @foreach ($arrProductMaterials as $product_material)
                                @php
                                    $type_name = $product_material->material_type_name;
                                    $type_id = $product_material->material_type_id;
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
                                    <div class="border p-3 item-value-card mb-3 cal-select-item" data-metal_id="{{$type_id}}">
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
                </div>
                <h2 class="accordion-header" id="">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#"
                        aria-expanded="true" aria-controls="">
                        Step2: Select the type of diamond you want to below.
                    </button>
                </h2>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    $('.cal-select-item').on('click', function(){
        $('.cal-select-item').removeClass('active')
        $(this).addClass('active')
        var type_id = $(this).data('type_id')
    })
</script>