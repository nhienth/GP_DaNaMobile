<?php

namespace App\Http\Controllers;
use  App\Models\Order;
use  App\Models\OrderDetails;
use  App\Models\OrderDetail;
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
        //
        $allorder = Order::all();
        return view('admin.order.list')->with(compact('allorder'));
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

        $slider = Slider::find($id);
        $slider->update($request->only('slider_img'));
        return redirect()->route('slider.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order_detail = OrderDetails::find($id);
        // dd($order);
        return view('admin.order.details', compact('order_detail'));
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
        return view('admin.order.edit')->with(compact('order'));
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
