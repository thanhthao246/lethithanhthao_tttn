<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class CategoryList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function render()
    {
        $list_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])->get();
        return view('components.category-list', compact('list_category'));
    }
}
