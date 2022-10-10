<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preview;
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
            ->select('product_id', DB::raw('count(*) as total'))
            ->groupBy('product_id')
            ->get();
    
        return view('admin.preview.list',compact('previews'));
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
