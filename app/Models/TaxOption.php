<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function getOption($product_id) {
        $row = ProductTaxOption::where('product_id', $product_id)->where('tax_option_id', $this->id)->first();

        return $row;
    }
}
