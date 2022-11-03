<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
   
    private $contact;
    public function __construct()
    {
        $this->contact = new Contact();
    }
    public function index()
    {
        $result = $this->contact->all();
        return view('admin.contact.list', compact('result'));
    }


    public function show($id)
        {
            // 
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        $user = User::first();
        return view('client.contact.index')->with(compact('categories','slider','banner','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('file_img')) {
            $file = $request->file_img;
            $file_name = $file->getClientoriginalName();
            // dd($file_name);
            $file->move(public_path('images/slider'), $file_name);
        }
        
        $request->merge(['slider_img' => $file_name]);
        // dd($request->all());
        if (Slider::create($request->all())) {
            return redirect()->route('slider.list')->with('success', 'Thêm thành công');
        }
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
    public function update( $id)
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
