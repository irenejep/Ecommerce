<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Order;

use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
                ->join('users', 'user_id','=', 'users.id')
                ->join('order_statuses', 'order_status_id','order_statuses.id' )
                ->select('orders.*', 'order_statuses.order_status_name', 'users.name')
                ->where('seller_id', 'orders.seller_id')
                ->get();

                return view('orders.indexSeller', compact(['orders']));
    }
    public function placeorder(Request $request, $id){
        $order =DB::table('orders')
         ->update(['order_status_id'=>2]);
         return redirect('/orders');
    }

    public function finish(Request $request, $id){
        $order =DB::table('orders')
         ->update(['order_status_id'=>3]);
         return redirect('/orders');
    }

    public function indexbuyer(){
        $orders = DB::table('orders')
                ->join('users', 'user_id','=', 'users.id')
                ->join('order_statuses', 'order_status_id','order_statuses.id' )
                ->select('orders.*', 'order_statuses.order_status_name', 'users.name')
                ->where('user_id', 'users.id')
                ->get();
                return view('orders.indexBuyer', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function storecart(Request $request)
    {
        $this->validate(request(),[
        ]);

            $products = Product::all();

            Order::create(request(['order_status_id', 'product_id', 'user_id', 'price']));

            session()->flash("success_message", "You have added a new item to cart");

            $totalItems = DB::table('orders')
                        ->where('order_status_id', 1)
                        ->count();
            $quantity = DB::table('orders')
            ->where('product_id', 1)
            ->count();

            return view('productBuyer.indx', compact(['totalItems', 'products', 'quantity']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
        ]);

            $products = Product::all();

            $totalItems = DB::table('order_items')
            ->count();

            Order::create(request(['user_id', 'order_status_id']));

            session()->flash("success_message", "You have added a new item to orders");

            return view('productBuyer.indx', compact(['products', 'totalItems']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = DB::table('orders')
        ->join('users', 'user_id','=', 'users.id')
        ->join('order_statuses', 'order_status_id','order_statuses.id' )
        ->select('orders.*', 'order_statuses.order_status_name', 'users.name')
        ->get();
        return view('orders.show', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Order::where('id', $id)
           ->delete();

           session()->flash("success_message_delete", "You have sucessfully canceled order of this item");

        return redirect('/ordersbuyer');
    }
}
