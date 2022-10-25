<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MaterialTypeDiamonds;
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
        
        $arrMaterials = self::leftjoin('material_type_diamonds', 'diamond_id', '=', 'material_type_diamonds.id')
            ->select('material_type_diamonds.mm_size', 'material_type_diamonds.carat_weight', 'product_materials.*')
            ->where('product_id', $product_id)
            ->get();

        foreach ($arrMaterials as $material) {
            $result[$material->material_id][] = $material;
        }

        return $result;
    }
    
    public static function getDiamondsByProduct($product_id) {
        
        $arrMaterials = self::leftjoin('material_type_diamonds', 'diamond_id', '=', 'material_type_diamonds.id')
            ->leftjoin('material_types', 'material_type_diamonds.material_type_id', '=', 'material_types.id')
            ->select('material_type_diamonds.mm_size', 'material_type_diamonds.carat_weight', 'product_materials.*', 'material_types.type as typename')
            ->selectRaw('ROUND(material_type_diamonds.`carat_weight` * product_materials.`diamond_amount`, 2) AS tcw')
            ->where('product_id', $product_id)
            ->where('is_diamond','1')
            ->get();

        return $arrMaterials;
    }


    public static function getMaterialsHtml($product_id) {
        $arrMaterials = Material::with('types')->get();
        $materials = self::where('product_id', $product_id)
            ->orderBy('id')
            ->get();
        $arrProductMaterials = self::getMaterialsByProduct($product_id);
        $arrDiamondTypes = MaterialTypeDiamonds::where('material_id','=', '1')->get();

        $materials_html = view('backend.products.materials.items', compact(
            'arrMaterials', 'arrProductMaterials', 'materials', 'arrDiamondTypes'
        ))->render();

        return $materials_html;
    }
}
