<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Order_item;

use App\Order;

use Session;

use App\Cart;

use Illuminate\Support\Facades\Auth;

use DB;

class OrderController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
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
    public function storecart(Request $request, $id)
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->where('order_status_id', 1)
            ->get();
            if(!count($orders)){
                $order_number = time();
                $order = new Order;
                $order->user_id = $request->user_id;
                $order->seller_id = $request->seller_id;
                $order->product_id = $request->product_id;
                $order->price = $request->price;
                $order->order_status_id = 1;
                $order->order_number = $order_number;
                $order->save();  

                if($order->save()){
                    $order_id=$order->id;
                }
                $orderItem = new Order_item;
                $orderItem->order_id = $order_id;
                $orderItem->product_id = $request->product_id;
                $orderItem->quantity = 1;
                $orderItem->price = $request->price;
                $orderItem->user_id = $request->user_id;
                $orderItem->save();

            }
            else{
                $order = Order::where('user_id', Auth::user()->id)
                ->where('order_status_id', 1)
                ->first();
                $order_id = $order->id;
                $orderItem = new Order_item;
                $orderItem->order_id = $order_id;
                $orderItem->product_id = $request->product_id;
                $orderItem->quantity = 1;
                $orderItem->user_id = $request->user_id;
                $orderItem->price = $request->price;
                $orderItem->save();
            }

        //     $orderitems = Order_item::all();
        //     $product = Product::find($id);
        //     $oldCart = Session::has('cart') ? Session::get('cart'):null;
        //     $cart = new Cart($oldCart);
        //     $cart->add($product, $product->id);
    
        //     $request->session()->put('cart', $cart);
        return back();
    }

    public function viewcart()
    {
        $products = Product::all();
        $orders = DB::table('order_items')
                ->where('user_id', Auth::user()->id)
                ->get();
        return view('cart.index', compact('orders', 'products'));

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
