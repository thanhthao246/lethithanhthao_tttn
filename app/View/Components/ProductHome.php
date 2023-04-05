<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;
use App\Models\Category;

class ProductHome extends Component
{
    public $row_category;
    public function __construct($rowcat)
    {
        $this->row_category = $rowcat;
    }

    public function render()
    {
        $row_cat = $this->row_category;
        $product_list = Product::all();//tát cả
        return view('components.product-home', compact('row_cat', 'product_list'));
    }
}
