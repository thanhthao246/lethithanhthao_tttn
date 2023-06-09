<?php

namespace App;

class Cart
{
    public $products = null;
    public $totalPrice_buy = 0;
    public $totalQuanty = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice_buy = $cart->totalPrice_buy;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }
    public function AddCart($product, $id)
    {
        $newProduct = [
            'qty' => 0, 'price_buy' => $product->price_buy, 'productinfo' => $product, 'img' => $product->productimg
        ];
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['qty']++;
        $newProduct['price_buy'] = $newProduct['qty'] * $product->price_buy;
        $this->products[$id] = $newProduct;
        $this->totalPrice_buy += $product->price_buy;
        $this->totalQuanty++;
    }
    public function DeleteCart($id)
    {
        $this->totalQuanty -= $this->products[$id]['qty'];
        $this->totalPrice_buy -= $this->products[$id]['price_buy'];
        unset($this->products[$id]);
    }

    public function UpdateCart($id, $qty)
    {
        $this->totalQuanty -= $this->products[$id]['qty'];
        $this->totalPrice_buy -= $this->products[$id]['price_buy'];

        $this->products[$id]['qty'] = $qty;
        $this->products[$id]['price_buy'] = $qty * $this->products[$id]['productinfo']->price_buy;

        $this->totalQuanty += $this->products[$id]['qty'];
        $this->totalPrice_buy += $this->products[$id]['price_buy'];
    }
}
