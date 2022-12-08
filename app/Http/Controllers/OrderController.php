<?php

namespace App\Http\Controllers;
use  App\Models\Order;
use  App\Models\OrderDetails;
use  App\Models\Slider;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('orderdetail')->get();
        
        return view('admin.order.list',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->status = $request -> status;
        $order->save();

        return redirect('/admin/order/list');

        // $slider = Slider::find($id);
        // $slider->update($request->only('slider_img'));
        // return redirect()->route('slider.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $detail = OrderDetails::where('order_id','=', $id)->get();
        return view('admin.order.details', compact('order','detail'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.order.edit',compact('order'));
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
        $order = Order::find($id);
        $order ->id = $request->id;
        $order ->status = $request->status;

        $order->save();
        // dd($order);
        return redirect('admin/order/list')->with('status','Bạn đã cập nhật thành công');
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
