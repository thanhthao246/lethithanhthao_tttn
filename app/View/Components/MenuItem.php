<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MenuItem extends Component
{
    public $row_menu = null;
    public function __construct($menu)
    {
        $this->row_menu = $menu;
    }

    public function render(): View|Closure|string
    {
        $menu = $this->row_menu;
        $dk =[
            ['status','=','1'],
            ['parent_id', '=', $menu->id], 
            ['position', '=', 'mainmenu']
        ];
        $list_menu_sub = Menu::where($dk)->orderBy('sort_order', 'asc')->get();
        $sub=false;
        if(count($list_menu_sub)>0){
            $sub=true;
        }
        return view('components.menu-item',compact('sub','list_menu_sub','menu'));
    }
}
