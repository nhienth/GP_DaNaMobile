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
use App\Models\Post;
use App\Http\Middleware\checklogin;
use DB;

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
            // ->select('product_id', DB::raw('count(*) as total'),DB::raw('DATE(created_at) as date)'))
            // ->groupBy('product_id')
            ->select(DB::raw('product_id, max(created_at) as maxdate, min(created_at) as mindate'),DB::raw('count(*) as total'))
            ->groupBy('product_id')
               //->orderBy('paper_update', 'desc')
            ->get();
        // dd($previews);
        return view('admin.preview.list',compact('previews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //previewProduct
    public function product_details($id)
    {   
        $product = Product::find($id);
        $categories = Category::all();
        $previews = Preview::where('product_id',$id)->get();
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        return view('client.products.product_details',compact('categories' ,'slider','banner','product','previews'));
    }

    public function preview(Request $request, $id)
    {
        $previews = new Preview();
        $previews->rate = 0;
        $previews->review = $request->review;
        $previews->status = 0;
        $previews->user_id = Auth::user()->id;     
        $previews->product_id = $id; 
       
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
        $detail = Preview::with(['product', 'user'])->where('product_reviews.product_id',$id)->get();
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
        return redirect('admin/preview/list')->with('status','Bạn đã Xóa thành công');
    }

    

}
