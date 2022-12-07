<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\Preview;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Http\Middleware\checklogin;
use Illuminate\Support\Facades\DB;

class PreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $previews = Preview::with('product')
            ->select(DB::raw('product_id, max(created_at) as maxdate, min(created_at) as mindate, avg(status) as avgrate'), DB::raw('count(*) as total'))
            ->groupBy('product_id')
            ->get();
        return view('admin.preview.list', compact('previews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productReview($id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        $previews = Preview::where('product_id',$id)->get();
        $slider = Slider::first()->orderBy('slider.created_at', 'DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at', 'DESC')->paginate(1);
        $product = Product::with(['category', 'variations', 'variation_value', 'combinations', 'images', 'specfications'])
        ->where('products.id', $id)->first();
        $product->product_view+=1;
        $product->save();
        $similarProducts = Product::with(['category'])
            ->where('products.category_id', $product->category_id)
            ->where('products.id', '!=', $id)
            ->take(6)
            ->get();
        $countall = DB::table('product_reviews')->where('product_id','=',$product->id)->count();
        $count5 = DB::table('product_reviews')->where('product_id','=',$product->id)->where('status', '=', 5)->count();
        $count4 = DB::table('product_reviews')->where('product_id','=',$product->id)->where('status', '=', 4)->count();
        $count3 = DB::table('product_reviews')->where('product_id','=',$product->id)->where('status', '=', 3)->count();
        $count2 = DB::table('product_reviews')->where('product_id','=',$product->id)->where('status', '=', 2)->count();
        $count1 = DB::table('product_reviews')->where('product_id','=',$product->id)->where('status', '=', 1)->count();
        
        if ($countall > 0 ) {
            $total = ($count5*5 + $count4*4 + $count3*3 + $count2*2 + $count1*1)/$countall;
            $round =  round($total, 1);
            $previews = DB::table('product_reviews')->join('users','users.id','=','product_reviews.user_id')->select('product_reviews.*','users.name')->where('product_id','=',$product->id)->get();
            return view('client.products.product_details' , compact('product','previews', 'countall','count5','count4','count3','count2','count1', 'round', 'similarProducts' ));
        }
        else {
            $previews = DB::table('product_reviews')->join('users','users.id','=','product_reviews.user_id')->select('product_reviews.*','users.name')->where('product_id','=',$product->id)->get();
            return view('client.products.product_details' , compact('product','previews','countall','count5','count4','count3','count2','count1', 'similarProducts'));
        }    

        return view('client.products.product_details', compact('categories', 'slider', 'banner', 'products', 'previews','product', 'similarProducts'));
    }

    public function preview(Request $request, $id)
    {
        $previews = new Preview();
        $previews->rate = 5;
        $previews->review = $request->review;
        $previews->user_id = Auth::user()->id;
        $previews->product_id = $id;

        if ($request->rating_status > 0) {
            $previews->status = $request->rating_status;
        } else {
            $previews->status = 5;
        }

        $previews->save();
        return back();
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
        $detail = Preview::with(['product', 'user'])->where('product_reviews.product_id', $id)->get();
        // dd($detail);
        return view('admin.preview.detail')->with(compact('detail'));
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
        $preview = Preview::find($id);
        $preview->delete();
        return redirect('admin/preview/list')->with('status', 'Bạn đã Xóa thành công');
    }
}