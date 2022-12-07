<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Slider;
use  App\Models\User;
use  App\Models\User_addresses;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alluser = User::all();
        return view('admin.user.list')->with(compact('alluser'));
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
        $categories = Category::all();
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        $user = User::find($id);
        return view('client.user.show')->with(compact('categories','slider','banner','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit')->with(compact('user'));
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
        $user = User::find($id);
        $user ->id = $request->id;
        $user ->role = $request->role;
        $user ->status = $request->status;
        // $user ->email = $request->email;

        $user->save();
        // dd($order);
        return  $this->index()->with('status','Bạn đã cập nhật thành công');
        
    }


    // client
    public function useredit($id)
    {
        $categories = Category::all();
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        $user = User::find($id);
        return view('client.user.edit')->with(compact('categories','slider','banner','user'));
    }

    public function userupdate(Request $request, $id)
    {
        $user = User::find($id);
        $user ->id = $request->id;
        $user ->name = $request->name;
        $user ->email = $request->email;

        $user->save();
        // dd($order);
        return  $this->show($id)->with('status','Bạn đã cập nhật thành công');
        
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
