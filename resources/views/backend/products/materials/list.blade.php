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

    $('body').on('click', '.btn-add-material', function() {
        var material_id = $(this).data('material-id');
        var material_type_id = $('#modalAddMaterial' + material_id +  ' #selMaterialType').val();
        var material_weight = $('#modalAddMaterial' + material_id + ' #txtMaterialWeight').val();

        $.ajax({
            type: 'POST',
            url: "{{ route('backend.products.materials.store') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "product_id": product_id,
                "material_type_id": material_type_id,
                "material_weight": material_weight
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

        $(modal + ' #selMaterialType').val(material_type_id);
        $(modal + ' #txtMaterialWeight').val(material_weight);
    });

    $('body').on('click', '.btn-update-material', function() {
        var material_id = $(this).data('material-id');
        var material_type_id = $('#modalEditMaterial' + material_id + ' #selMaterialType').val();
        var material_weight = $('#modalEditMaterial' + material_id + ' #txtMaterialWeight').val();

        $.ajax({
            type: 'POST',
            url: "{{ route('backend.products.materials.update') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "_method": "PUT",
                "id": cur_product_material_id,
                "product_id": product_id,
                "material_type_id": material_type_id,
                "material_weight": material_weight
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
