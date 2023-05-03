<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'lttt_menu';
    
    public function MainMenuSub(){
        return $this->hasMany(Menu::class,'parent_id');
    }
}
