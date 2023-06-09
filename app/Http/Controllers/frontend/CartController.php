<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App

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
            $oldcart = Session('Cart') ? Session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->AddCart($product, $id);

            $request->Session()->put('Cart', $newcart);
            // dd(Session('Cart'));
            return view('frontend.cart');
        }
    }
    public function DeleteCart(Request $request, $id)
    {
        $oldcart = Session('Cart') ? Session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteCart($id);

        if (Count($newcart->products) > 0) {
            $request->Session()->put('Cart', $newcart);
        } else {
            $request->Session()->forget('Cart');
        }
        return view('frontend.cart');
    }
    public function ListCart()
    {
        return view('frontend.list-cart');
    }
    public function DeleteListCart(Request $req, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteCart($id);

        if (Count($newCart->products) > 0) {
            $req->Session()->put('Cart', $newCart);
        } else {
            $req->Session()->forget('Cart');
        }
        return view('frontend.list-cart');
    }

    // public function SaveListCart(Request $req, $id, $quanty)
    // {
    //     $oldCart = Session('Cart') ? Session('Cart') : null;
    //     $newCart = new Cart($oldCart);
    //     $newCart->UpdateCart($id, $quanty);
    //     $req->Session()->put('Cart', $newCart);
    //     return view('frontend.cart.list');
    // }
}
