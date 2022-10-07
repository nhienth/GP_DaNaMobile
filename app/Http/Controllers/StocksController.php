<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use App\Models\Products;
use App\Models\Combinations;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $allstocks = Stocks::all();
        $products_stocks = Products::with(['combinations', 'stock'])->get();
        // dd($products_stocks);
        // foreach ($products_stocks as $products_stock) {
        //     foreach ($products_stock->combinations as $value) {
        //         print_r($value->combination_string);
        //     }
        // }

        // $stocks = Products::with('stock')->get();

        // dd($products_stocks);

        // $stocks = Stocks::with('product')->get();
        // foreach ($stocks as $stock) {
        //     print_r($stock->product->id);
        // }

        return view('admin.stocks.list')->with(compact('products_stocks'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo $id;
        // $combi = Combinations::find($id);
        $combi = Combinations::with(['product','stock'])->where('products_combinations.product_id',$id)->get();
        // dd($combi);
        // $data = Stocks::with('combination')->where('products_id', $id)->first();
        // $combi = Products::with('combinations')->where('products_id', $data)->get();
        return view('admin.stocks.stockdetail')->with(compact('combi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function edit(Stocks $stocks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stocks $stocks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stocks $stocks)
    {
        //
    }

}
