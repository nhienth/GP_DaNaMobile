<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variation;
use App\Models\Variation_Option;
use App\Models\Variation_Option_Value;

use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);
        $variations = Variation::all();
        return view('admin.variation.create', compact(['product', 'variations']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::with(['variations', 'variation_value'])->where('products.id',$request->product_id )->first();
        dd($product);
        $variations = Variation::all();
        foreach ($variations as $variation) {
            $variation_option = new Variation_Option();
            
            $variation_option->variation_name =  $variation->variation_name;
            $variation_option->product_id =  $request->product_id;

            $variation_option->save();

            $variation_option_value = new Variation_Option_Value();

            $variation_option_value->variation_name = $variation->variation_name;
            $inputRequestValue = $variation->id . "_value";

            $variation_option_value->variation_value = $request->$inputRequestValue;
            
            $variation_option_value->products_variation_id = $variation_option->id;

            $variation_option_value->save();
        }

        // $product_variations_value = Product::with(['variations', 'variation_value'])
        //     ->where('products_variations_options.product_id', $request->product_id)
        //     ->get();

        // dd($product_variations_value);
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
        //
    }
}