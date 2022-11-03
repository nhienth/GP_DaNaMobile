<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\Product;
use App\Models\User;
use App\Models\Post;
use App\Models\Preview;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $parent_id = $category->parent_id;
            $partenCateName = $this->getCategoryName($parent_id);
            $category['parent_cate'] = $partenCateName;
        }
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        // $product = Product::all();
        $product = Product::with(['combinations', 'stock'])->get();
        return view('client.index')->with(compact('categories','slider','banner','product'));

       
    }

    public function getCategoryName($id) {
        if($id != 0) {
            $category = Category::find($id);
            return $category->category_name;
        }
        
    }

    public function product_details($id)
    {   
        $products = Product::find($id);
        $categories = Category::all();
        $previews = Preview::all();
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        return view('client.products.product_details',compact('categories' ,'slider','banner','products','previews'));

    }
    public function preview(Request $request, $id)
    {
        $previews = new Preview();
        $previews->rate = 5;
        $previews->review = $request->review;
        $previews->status = 1;
        $previews->user_id = Auth::user()->id;     
        $previews->product_id = $id; 
        $previews->save();
        return back();
    }

    public function post()
    {
        //Post
        $categories = Category::all();
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        $allPost = Post::all();
        return view('client.blogs.post',compact('categories' ,'slider','banner','allPost'));  
        
    }

    public function post_details($id)
    {
        $categories = Category::all();
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        $allPost = Post::all();
        $post = Post::find($id);    
        return view('client.blogs.post_details',compact('categories' ,'slider','banner','allPost','post'));    
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
    public function store(Request $request, $id)
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
