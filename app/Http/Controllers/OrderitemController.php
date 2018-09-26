<?php

namespace App\Http\Controllers;

use App\Order_item;

use DB;

use App\Product;

use Illuminate\Http\Request;

class OrderitemController extends Controller
{
    // public function create()
    // {
    //     $categories = Order_item::all();
    //     return view('cart.index', compact('categories')); 
    // }

    public function storecart(Request $request)
    {
        $this->validate(request(),[
        ]);

            $products = Product::all();

            Order_item::create(request(['product_id', 'user_id','price', 'quantity']));

            session()->flash("success_message", "You have added a new item to cart");

            $totalItems = DB::table('order_items')
            ->count();

            return view('productBuyer.indx', compact(['totalItems', 'products']));
    }

    public function removefromcart($id){
        $products = Product::all();
        Order_item::where('id', $id)
           ->delete();

           session()->flash("success_message_delete", "You have sucessfully removed product from cart");

        return back();
    }

    public function quantity($product_id){
        $quantity = DB::table('order_items')
        ->orderBy('product_id')
        ->count();
        dd($quantity);
        return view('cart.index', compact('orderitems','quantity'));
    }
}
