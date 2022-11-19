<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Slider;
use App\Models\User;
use App\Models\User_addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AddressControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User_addresses::with('user')->where('user_addresses.user_id',$id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        
        $categories = Category::all();
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        // $user = User_addresses::with('user')->where('user_addresses.user_id',$user_id)->find($user_id);
        return view('client.user_address.create')->with(compact('categories','slider','banner')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new User_addresses();
        $address->completeAddress = $request -> completeAddress;
        $address->phoneNumber = $request -> phoneNumber;
        $address->user_id = Auth::user()->id;
        $address->save();

        return redirect('/user/showaddress/'.Auth::user()->id)->with('messenger','Thêm địa chỉ thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        // $user = User::with('user_addresses')->find($id);
        $users = User_addresses::with('user')->where('user_addresses.user_id',$id)->get();
        // dd($users);
        return view('client.user_address.show')->with(compact('categories','slider','banner','users'));
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
        Auth::user()->id;
        $address = User_addresses::find($id);
        $address->delete();
        return redirect('/user/showaddress/'.Auth::user()->id)->with('messenger','Xóa địa chỉ thành công');
    }
}