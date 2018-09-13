<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Productfeature;

use App\Feature;

use App\Product;

class ProductfeatureController extends Controller
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
        $productfeatures = Productfeature::all();
        return view('productfeatures.index', compact('productfeatures'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $features= Feature::all();
        return view('productfeatures.create', compact(['products','features'])); 
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
            'product_id'=>'required',
            'feature_id'=>'required'
            ]);

            Productfeature::create(request(['product_id','feature_id']));

            session()->flash("success_message", "You have added a new feature");
    
            return redirect('/productfeatures');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $id)
    {
        $feature = Product::find($id)->where ('id', $id->product_id);
        return view('features.index', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Productfeature::find($id);

        session()->flash("success_message_edit", "You have edited category");

        return view('productfeatures.edit', compact('feature'));
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
            Productfeature::where('id', $id)
            ->update(request(['feature_id','product_id']));
            return redirect('/productfeatures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Productfeature::where('id', $id)
           ->delete();

           session()->flash("success_message_delete", "You have sucessfully deleted feature");

        return redirect('/productfeatures');
    }
}
