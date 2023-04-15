<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Brand;

class BandList extends Component
{
    public function __construct()
    {
        //
    }
    public function render()
    {
        $list_brand = Brand::where('status', '=', 1)->get();
        return view('components.band-list', compact('list_brand'));
    }
}
