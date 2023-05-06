<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function index()
    {
        $carts = DB::table('lttt_cart')->get();
        dd($carts);
        return view('index', compact('lttt_cart'));
    }
    public function AddCart($id)
    {
        $product = DB::table('lttt_cart')->where('id', $id)->first();
        dd($product);
    }
}
