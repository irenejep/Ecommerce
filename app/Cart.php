<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product(){
        $this->hasMany(Product::class);
    }
    public $items;
    public $totalQty=0;
    public $totalPrice=0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id, $quantity=1){
        $storedItem = ['product_quantity'=>0, 'product_price'=>$item->price, 'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
            $storedItem['product_quantity']++;
            $storedItem['product_price'] = $items->price * $storedItem['product_quantity'];
            $this->items[$id] = $storedItem;
            $this->totalQty++;
            $this->totalPrice += $items->product_price;
        }
    }
}
