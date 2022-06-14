<?php

namespace App\View\Components;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\Component;

class ProductsTable extends Component
{
    public function __construct(public string $locale = 'cart', public $products = null)
    {
        $this->products = $products ?? Cart::content();
    }

    public function render()
    {
        return view('components.products-table');
    }
}
