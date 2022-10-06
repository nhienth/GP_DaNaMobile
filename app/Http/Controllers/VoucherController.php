<?php

namespace App\Http\Controllers;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $voucher;
    public function __construct()
    {
        $this->voucher = new Voucher();
    }
    public function index()
    {
       $result = $this->voucher::all();
       return view('admin.voucher.list', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.voucher.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $vou = new Voucher();
        $vouchers = Voucher::all();
        $vou -> voucher_id = $request['vocher_id'];
        $vou -> voucher_code = $request['vocher_code'];
        $vou -> voucher_type = $request['vocher_type'];
        $vou -> voucher_value = $request['vocher_value'];
        $vou -> voucher_product_id = $request['vocher_product_id'];
        $vou -> voucher_status = $request['voucher_status'];
        $vou -> save();
        
        return redirect()->route('voucher.list')->with('success', 'Thêm thành công');
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
       $voucher = $this->voucher->find($id);
       return view('admin.voucher.edit',compact('banner'));

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
        $vou = Voucher::find($id);
        $vou -> voucher_id = $request['vocher_id'];
        $vou -> voucher_code = $request['vocher_code'];
        $vou -> voucher_type = $request['vocher_type'];
        $vou -> voucher_value = $request['vocher_value'];
        $vou -> voucher_product_id = $request['vocher_product_id'];
        $vou -> voucher_status = $request['voucher_status'];
        $vou -> save();

        return redirect()->route('voucher.list')->with('success', 'Sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = Voucher::find($id);
        $voucher->delete();
        return redirect()->route('voucher.list');
    }
}
   