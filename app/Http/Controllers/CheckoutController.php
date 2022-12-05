<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Voucher;
use App\Models\VoucherUser;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $payments = Payment::all();
        $productList = session('cart');
        $user = User::with('user_addresses')->where('users.id', $userId)->first();    
        $list_vu = VoucherUser::with('vu_voucher','vu_user')->where('user_id',Auth::user()->id)->get();

        return view('client.shop.checkout', compact('user', 'productList','payments'));
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
        $bill = new Order();
        $bill->user_id = $request->user_id;

        $bill->fullname = $request->fullname;
        $bill->address = $request->address;
        $bill->email = $request->email;
        $bill->phone = $request->phone;
        $bill->note = "a";
        $bill->status = 0;
        $bill->payment_id = 0;
        $bill->total_amount = $request->total_amount;
        $bill->note = $request->note;
        $bill->save();
        foreach(session('cart') as $cart){
          
            $billDetails = new OrderDetails();
            $billDetails->order_id = $bill->id;
            $billDetails->product_id = $cart['id_combi'];
            $billDetails->quantity = $cart['quantity'];
            $billDetails->total_amount = $cart['quantity']*$cart['price'];
            $billDetails->save();
        }
    
        return 0;
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
