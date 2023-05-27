<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
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
        $product = Product::where('id', $id)->first();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);

            $request->session()->put('Cart', $newCart);
        }
        return view('frontend.cart');
    }
    public function DeleteCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteCart($id);
        if (Count($newCart->products) > 0) {
            $request->Session()->put('Cart', $newCart);
        } else {
            $request->Session()->forget('Cart');
        }
        return view('frontend.cart');
    }
}
