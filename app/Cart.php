<?php
namespace App;
class Cart{
    public $carts=null;
    public $totalPrice_buy=0;
    public $totalQuanty=0;

    public function __constant($cart)
    {
        if($cart){
            $this->carts=$cart->carts;
            $this->totalPrice_buy=$cart->totalPrice;
            $this->totalQuanty=$cart->totalQuanty;

        }
    }
    public function AddCart($product,$id)
    {
        $newProduct =['qty'=>0,'price_buy'=>$product->price_buy, 'productinfo'=>$product];
        if($this->carts)
        {
            if(array_key_exists($id, $this->carts))
            {
                $newProduct= $this->carts[$id];
            }
        }
        $newProduct['qty']++;
        $newProduct['price_buy']=$newProduct['qty'] * $product->price_buy;
        $this->carts[$id]=$newProduct;
        $this->totalPrice_buy += $product->price_buy;
        $this->totalQuanty ++;


    }
}
