<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class ProductForm extends Component
{
    public function __construct(public Product|null $product = null)
    {
    }

    public function render()
    {
        return view('components.product-form');
    }
}
