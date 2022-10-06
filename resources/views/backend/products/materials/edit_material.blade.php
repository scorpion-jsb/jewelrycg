<!-- Edit Material Modal -->
<div class="modal fade" id="modalEditMaterial{{ $material->id }}" tabindex="-1" aria-labelledby="momdalEditMaterialLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="momdalEditMaterialLabel">Edit {{ $material->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <div class="mb-3">
                    <label for="selMaterialType" class="col-form-label">Material Types:</label>
                    <select id="selMaterialType" class="form-control">
                        @foreach ($material->types as $material_type)
                            <option value="{{ $material_type->id }}">{{ $material_type->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="txtMaterialWeight" class="col-form-label">Material Weight:</label>
                    <input type="text" class="form-control" id="txtMaterialWeight">
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="button" class="btn btn-primary btn-update-material" data-material-id="{{ $material->id }}">Update</button>
            </div>
        </div>
    </div>
</div>
