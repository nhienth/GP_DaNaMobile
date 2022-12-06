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
        $payments = Payment::where('payment_status', '1')->get();
        $productList = session('cart');
        $user = User::with('user_addresses')->where('users.id', $userId)->first();    
        $this->checkVoucher(Auth::user()->id);
        $list_vu = VoucherUser::with('vu_voucher','vu_user')->where('user_id',Auth::user()->id)->get();
        return view('client.shop.checkout', compact('user', 'productList','payments','list_vu'));
    }
    public function checkVoucher($id){
        $list = Voucher::all();
        foreach ($list as $key ) {
            if($key->numberof < 1){
                Voucher::find($key->id)->delete();
                VoucherUser::where('voucher_id',$key->id)->delete();
            }
            if($key->time < date('Y-m-d', time())){
                Voucher::find($key->id)->delete();
                VoucherUser::where('voucher_id',$key->id)->delete();
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function useCheckout(Request $request)
    {
        $voucher_id = $request->voucher_id;
        $voucher = Voucher::find($voucher_id);
        $vc = session()->get('vc', []);
        // if($voucher->type ="Giảm theo tiền"){
        //     $vc['value'] = $voucher->value;
        // }else{
        //     $vc['value'] = $voucher->value*0.01;
        // }
        $vc['value'] = $voucher->value;
        $vc['id'] = $voucher->id;
        $vc['type'] = $voucher->type;
        session()->put('vc', $vc);
        // dd(session('vc')['value']);
        return redirect()->back();
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
        $bill->status = 0;
        $bill->payment_id = $request->payment_id;
        $bill->total_amount = $request->total_amount;
        $bill->voucher = $request->voucher;
        if($request->note){
            $bill->note = $request->note;
        }else{
            $bill->note = '';
        }
        $bill->save();
        foreach(session('cart') as $cart){
          
            $billDetails = new OrderDetails();
            $billDetails->order_id = $bill->id;
            $billDetails->product_id = $cart['id_combi'];
            $billDetails->quantity = $cart['quantity'];
            $billDetails->total_amount = $cart['quantity']*$cart['price'];
            $billDetails->save();
        }
    
        return route('index');
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
