<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Feature;

class FeatureController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::all();
        return view('features.index', compact('features'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::all();
        return view('features.create', compact('features')); 
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
            'feature_name'=>'required'
            ]);

            Feature::create(request(['feature_name','user_id' => auth()->id()]));

            session()->flash("success_message", "You have added a new feature");
    
            return redirect('/features');
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
        $feature = Feature::find($id);

        session()->flash("success_message_edit", "You have edited category");

        return view('features.edit', compact('feature'));
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
            Feature::where('id', $id)
            ->update(request(['feature_name']));
            return redirect('/features');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feature::where('id', $id)
           ->delete();

           session()->flash("success_message_delete", "You have sucessfully deleted feature");

        return redirect('/features');
    }
}
