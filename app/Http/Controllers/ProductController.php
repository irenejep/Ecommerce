<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;

use App\Product;

use App\Order;

use Session;

use DB;

use App\Category;

use App\Order_item;

class ProductController extends Controller
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
        $products = Product::all();
        return view('products.index', compact('products'));

    }

    public function quantity(){
        $qty = DB::table('order_items')
        ->where('product_id', 2)
        ->count();
    }
    
    public function buyer()
    {
        $products = Product::all();
        $orderitems=Order_item::all();
        $totalItems = DB::table('order_items')
        ->count();

        $quantity = DB::table('order_items')
        ->orderBy('product_id')
        ->count();

        return view('productBuyer.indx', compact('products', 'totalItems', 'quantity'));

    }
    public function myJson(){
        $products= DB::table('products')
        ->get();
     
        return $products;
    }

    public function addtocart(Request $request, $id){
        $products = Product::all();
        $orderitems=Order_item::all();
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return view('cart.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories')); 
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
            'product_name'=>'required', 'product_status'=>'required','product_name'=>'required',
            'product_price'=>'required','product_description'=>'required'
            ]);

            Product::create(request(['product_name','user_id','product_status',
            'product_price','product_image', 'product_description',
            'category_id']));

            session()->flash("success_message", "You have added a new products");
    
            return redirect('/products');
            
    }

    public function viewcart()
    {
        $products = Product::all();
        $quantity = Order::orderBy('product_id')->get();
        $quantity = $quantity->groupBy(function ($member) {
        return $member->product_id;
        })->all();
        foreach ($quantity as $type => $list){
        $qty = count($list);
        }

        return view('productBuyer.indx', compact(['products', 'quantity', 'qty']));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        session()->flash("success_message_edit", "You have edited category");

        return view('products.edit', compact('product'));
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
        $this->validate(request(),[

            ]);
            Product::where('id', $id)
            ->update(request(['product_name']));
            return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)
           ->delete();

           session()->flash("success_message_delete", "You have sucessfully deleted product");

        return redirect('/products');
    }
}
