<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use DB;

class StatisticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Thống kê
        $category = Category::count();
        $role = User::count();
        $product = Product::count();
        $order = Order::count();

        // sản phẩm theo danh mục
        $probyCate = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('categories.*', 'products.*', DB::raw('count(*) as totalCate'))
        // ->orderBy('')
        ->where('category_id', '<>', '0')
        ->groupBy('category_id')
        ->pluck('totalCate', 'category_id')
        ->all();
        // dd($probyCate);

        return view('admin.index', compact(['category', 'role', 'product', 'order']));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
