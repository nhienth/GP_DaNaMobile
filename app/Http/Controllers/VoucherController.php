<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;

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
        $result = $this->voucher->all();
        return view('admin.voucher.list', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voucher = new Product();
        $result = $voucher::all();
        return view('admin.voucher.create', compact('result'));
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
        // $vou->voucher_id = $request['vocher_id'];
        $vou->code = $request['voucher_code'];
        $vou->type = $request['voucher_type'];
        $vou->value = $request['voucher_value'];
        $vou->product_id = $request['voucher_product_id'];
        $vou->status = $request['voucher_status'];
        $vou->save();
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
        $result = Product::all();
        return view('admin.voucher.edit', compact('voucher', 'result'));
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
        // $vou->voucher_id = $request['voucher_id'];
        $vou->code = $request['voucher_code'];
        $vou->type = $request['voucher_type'];
        $vou->value = $request['voucher_value'];
        $vou->product_id = $request['voucher_product_id'];
        $vou->status = $request['voucher_status'];
        $vou->save();

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