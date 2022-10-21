@php
use App\Models\ProductMaterial;

$materials = ProductMaterial::where('product_id', $product->id)
    ->get();
@endphp

<div id="divMaterials">
    @include('backend.products.materials.items')
</div>

@push('material_scripts')
<script>

var product_id = {{ $product->id }};
var cur_product_material_id = 0;

$(document).ready(function() {
    $('body').on('click', '.btn-delete-material', function() {
        isButtonClicked = true;
        var material_id = $(this).data('id');

        if (confirm('Do you want to delete this material really?')) {
            $.ajax({
                type: 'DELETE',
                url: "{{ route('backend.products.materials.delete') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "material_id": material_id,
                },
                dataType: "json",
                success: (result) => {
                    var materials_html = result.materials_html;
                    replaceMaterialsHtml(materials_html);
                },
                error: (resp) => {
                    var result = resp.responseJSON;
                    if (result.errors && result.message) {
                        alert(result.message);
                        return;
                    }
                }
            });
        }
    });

    $('body').on('click', '.btn-add-material-modal', function() {
        var modal = $(this).data('bs-target');
        $(modal + ' #selMaterialType').val('');
        $(modal + ' #txtMaterialWeight').val('');
    });

    
    $('#DiamondSize').on('select2:select', function (e) {
        var data = e.params.data;
        console.log(data);
        var tempelement =   '<div class="row">' + 
                                '<div class="col-4">'+
                                    '<label for="diamondSizeId" class="col-form-label">Value</label>'+
                                    '<input type="hidden" class="form-control" name="diamondId[]" value="' + data.id + '">'+
                                    '<h6 id="diamondSizeId">' + data.text + '</h6>'+
                                '</div>'+
                                '<div class="col-8">'+
                                    '<label for="diamondAmount" class="col-form-label">Amount</label>'+
                                    '<input type="text" class="form-control" name="diamondAmount[]">'+
                                '</div>'+
                           ' </div>';
        $('#sizeSetValues').append(tempelement)
    });

    $('body').on('click', '.btn-add-material', function() {
        var material_id = $(this).data('material-id');
        var material_type_id = $('#modalAddMaterial' + material_id +  ' #selMaterialType').val();
        var material_weight = $('#modalAddMaterial' + material_id + ' #txtMaterialWeight').val();
        if (material_id == 1) {
            var diamond_ids = $('#DiamondSize').val();
            var diamond_amount = $("input[name^='diamondAmount']").map(function (idx, ele) {
                return $(ele).val();
            }).get();
        } else {
            var diamond_amount = '';
            var diamond_ids = [];
        }
        $('#modalAddMaterial' + material_id + ' #txtMaterialWeight').val('');
        $('#modalAddMaterial' + material_id +  ' #selMaterialType').val('')
        $('#modalAddMaterial' + material_id + ' #diamondAmount').val('')

        $.ajax({
            type: 'POST',
            url: "{{ route('backend.products.materials.store') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "product_id": product_id,
                "material_type_id": material_type_id,
                "material_weight": material_weight,
                "diamond_amount": diamond_amount,
                "diamond_ids": diamond_ids
            },
            dataType: "json",
            success: (result) => {
                $('#modalAddMaterial' + material_id).modal('hide');
                var materials_html = result.materials_html;
                replaceMaterialsHtml(materials_html);
            },
            error: (resp) => {
                var result = resp.responseJSON;
                if (result.errors && result.message) {
                    alert(result.message);
                    return;
                }
            }
        });
    });

    $('body').on('click', '.btn-edit-material', function() {
        var modal = $(this).data('bs-target');
        cur_product_material_id = $(this).data('id');
        var material_type_id = $(this).data('material-type-id');
        var material_weight = $(this).data('material-weight');
        var diamond_size = $(this).data('diamond-size');
        var diamond_sizename = $(this).data('diamond-sizename');
        var diamond_amount = $(this).data('diamond-amount');

        $(modal + ' #selMaterialType').val(material_type_id);
        $(modal + ' #txtMaterialWeight').val(material_weight);
        $(modal + ' #editDiamondSizeId').val(diamond_size);
        $(modal + ' #editDiamondSizeName').html(diamond_sizename+"mm");
        $(modal + ' #editDiamondAmount').val(diamond_amount);
    });

    $('body').on('click', '.btn-update-material', function() {
        var material_id = $(this).data('material-id');
        var material_type_id = $('#modalEditMaterial' + material_id + ' #selMaterialType').val();
        var material_weight = $('#modalEditMaterial' + material_id + ' #txtMaterialWeight').val();
        var diamond_amount = $('#modalEditMaterial' + material_id + ' #editDiamondAmount').val();
        $.ajax({
            type: 'POST',
            url: "{{ route('backend.products.materials.update') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "_method": "PUT",
                "id": cur_product_material_id,
                "product_id": product_id,
                "material_type_id": material_type_id,
                "material_weight": material_weight,
                "diamond_amount": diamond_amount,
            },
            dataType: "json",
            success: (result) => {
                $('#modalEditMaterial' + material_id).modal('hide');
                var materials_html = result.materials_html;
                replaceMaterialsHtml(materials_html);
            },
            error: (resp) => {
                var result = resp.responseJSON;
                if (result.errors && result.message) {
                    alert(result.message);
                    return;
                }
            }
        });
    });
});

var replaceMaterialsHtml = function(materials_html) {
    $('#divMaterials').html(materials_html);
}
</script>

@endpush
