@foreach ($arrMaterials as $material)
<div class="card col-md-12 mb-6">
    <!-- Header -->
    <div class="card-header">
        <h4 class="card-header-title mb-0">{{ $material->name }}</h4>

        <button type="button" class="btn btn-sm btn-primary" class="btn-add-material-modal"
            data-bs-toggle="modal" data-bs-target="#modalAddMaterial{{ $material->id }}"
        >Add {{ $material->name}}</button>
    </div>
    <!-- End Header -->

    <div class="card-body row">
        <table class="table table-thead-bordered table-nowrap table-align-middle card-table table-responsive no-footer">
            <thead>
                @if($material->id == 1)
                <tr>
                    <th>Diamond</th>
                    <th>Diamond amount</th>
                    <th class='text-center action'>Action</th>
                </tr>
                @else
                <tr>
                    <th>Material</th>
                    <th>Material Weight</th>
                    <th class='text-center action'>Action</th>
                </tr>
                @endif
            </thead>
        
            <tbody>
                @if (isset($arrProductMaterials[$material->id]) && count($arrProductMaterials[$material->id]) > 0)
                    @foreach ($arrProductMaterials[$material->id] as $product_material)
                        <tr>
                            <!-- {{-- <td>{{ $product_material->material_type }}</td> --}} -->
                            <td>{{ $product_material->material_type_name }}</td>
                            
                            @if($material->id == 1)
                            <td>{{ $product_material->diamond_amount }}</td>
                            @else
                            <td>{{ $product_material->material_weight }}</td>
                            @endif
                            <td class='text-center action'>
                                <button type="button" class="btn btn-sm btn-info me-1 btn-edit-material"
                                    data-bs-toggle="modal" data-bs-target="#modalEditMaterial{{ $material->id }}"
                                    data-id="{{ $product_material->id }}"
                                    data-material-type-id="{{ $product_material->material_type_id }}"
                                    data-material-weight="{{ $product_material->material_weight }}"
                                    data-diamond-size="{{ $product_material->diamond_id }}"
                                    data-diamond-sizename="{{ $product_material->mm_size }}"
                                    data-diamond-amount="{{ $product_material->diamond_amount }}"
                                >Edit</button>
                                <button type="button" class="btn btn-sm btn-danger btn-delete-material"
                                    data-id="{{ $product_material->id }}"
                                >Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center">No Materials</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@include('backend.products.materials.add_material')
@include('backend.products.materials.edit_material')
@endforeach
