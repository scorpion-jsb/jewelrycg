<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMaterial extends Model
{
    protected $fillable = [
        'product_id', 'material_id', 'material_type_id', 'material_weight',
        'is_diamond', 'diamond_id', 'diamond_amount'
    ];

    protected $appends = [
        'material_name', 'material_type_name'
    ];

    public function material() {
        return $this->belongsTo(Material::class);
    }

    public function material_type() {
        return $this->belongsTo(MaterialType::class);
    }

    public function getMaterialNameAttribute() {
        return $this->material->name;
    }

    public function getMaterialTypeNameAttribute() {
        return $this->material_type->type;
    }

    public static function getMaterialsByProduct($product_id) {
        $result = [];

        $arrMaterials = self::where('product_id', $product_id)
            ->get();

        foreach ($arrMaterials as $material) {
            $result[$material->material_id][] = $material;
        }

        return $result;
    }

    public static function getMaterialsHtml($product_id) {
        $arrMaterials = Material::with('types')->get();
        $materials = self::where('product_id', $product_id)
            ->orderBy('id')
            ->get();
        $arrProductMaterials = self::getMaterialsByProduct($product_id);

        $materials_html = view('backend.products.materials.items', compact(
            'arrMaterials', 'arrProductMaterials', 'materials'
        ))->render();

        return $materials_html;
    }
}
