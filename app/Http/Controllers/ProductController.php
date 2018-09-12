<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

class ProductController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
