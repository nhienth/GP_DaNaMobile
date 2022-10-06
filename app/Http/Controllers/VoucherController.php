<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public  $html ='';
    public function index()
    {
    $vouchers = Voucher::all();
    
    return view('admin.voucher.list',['voucherList'=> $vouchers]);
}
public function create()
{
    $voucherSelect = $this -> res(0);
    return view('admin.voucher.create', compact('voucherSelect'));
}

public function store(Requets $request)
{
    $vou = new Voucher();
    $vouchers = Voucher::all();
    $vou -> voucher_id = $request['vouchers_id'];
    $vou -> voucher_code = $request['vouchers_code'];
    $vou -> voucher_type = $request['vouchers_type'];
    $vou -> voucher_value = $request['vouchers_value'];
    $vou -> product_id = $request['product_id'];
    $vou ->save();
    $voucherSelect = $this ->res(0);
    return $this->index();
}

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
    public function update($id)
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

    function res($id, $text = ''){
        $data = Voucher::all();  
            foreach($data as $value){
                if($value['product_id'] == $id)
                {
                    $this->html .='<option value="'.$value['id'].'">' .$text.$value['voucher_code'].'</option>';             
                    $this->res($value['id'], $text.'--');
                 }  
         }
         return $this->html;         
       }
}
