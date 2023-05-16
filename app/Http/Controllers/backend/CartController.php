<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function index()
    {
        $products = DB::table('lttt_product')->get();
        return view('index', compact('products'));
    }
    public function AddCart(Request $request, $id)
    {
        $product = DB::table('lttt_product')->where('id', $id)->first();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);

            $request->session()->put('cart', $newCart);
        }
        return view('cart', compact('newCart'));
    }
}
