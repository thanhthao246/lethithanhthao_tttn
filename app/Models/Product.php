<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'lttt_product';

    public function productimg()
    {
        return $this->hasMany(Productimage::class, 'product_id', 'id');
    }
}
