<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CategoryController;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Category;
use App\Models\ProductSpecificationsOptions;
use App\Models\ProductSpecificationsOptionsValue;
use App\Models\Product;
use App\Models\Preview;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Combinations;
use App\Models\Image_Gallery;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search()
    {
        $keywords = $_GET['key_cate_id'];
        $categories = Category::all();
        $products = Product::where('category_id', '=', $keywords)->paginate(5);
        if (count($products) != 0) {
            return view('admin.products.list')->with(compact('products', 'categories'));
        } else if (count($products) == 0) {
            $products = Product::with('category')->orderBy('products.id', 'desc')->paginate(5);
            return view('admin.products.list')->with(compact('products', 'categories'));
        }
    }

    public function filter_view(){
        $keywords = $_GET['view_selected'];
        $categories = Category::all();
        $products = Product::all();
        if($keywords == 1){
            $products = Product::with('category')->orderBy('products.product_view', 'desc')->paginate(5);
            return view('admin.products.list')->with(compact('products','categories'));
        }else if($keywords == 2){
            $products = Product::with('category')->orderBy('products.product_view', 'asc')->paginate(5);
            return view('admin.products.list')->with(compact('products','categories'));
        }else{
            $products = Product::with('category')->orderBy('products.id', 'asc')->paginate(5);
            return view('admin.products.list')->with(compact('products','categories'));
        }
    }

    public function filter_status(){
        $keywords = $_GET['status_selected'];
        $categories = Category::all();
        $products = Product::where('product_status', '=', $keywords)->paginate(5);
        if($keywords != 2){
            return view('admin.products.list')->with(compact('products','categories'));
        }else{
            $products = Product::with('category')->paginate(5);
            return view('admin.products.list')->with(compact('products','categories'));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->orderBy('products.id', 'desc')->paginate(5);
        return view('admin.products.list', compact(['categories', 'products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cate = new CategoryController();
        $categorySelect = $cate->res(0);
        $specfications = ProductSpecificationsOptions::all();
        return view('admin.products.create', compact(['specfications', 'categorySelect']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;

        // Ảnh đại diện
        $imgpath = $_FILES['product_img']['name'];
        $target_dir = "../public/images/products/";
        $target_file =  $target_dir . basename($imgpath);
        move_uploaded_file($_FILES['product_img']['tmp_name'], $target_file);
        $product->product_img = $imgpath;
        $product->product_desc = $request->product_desc;
        $product->product_status = 1;
        $product->save();

        // Thư viện ảnh
        $name = array();
        $tmp_name = array();
        $error = array();
        $ext = array();
        $size = array();
        foreach ($_FILES['product_img_gallery']['name'] as $file) {
            $name[] = $file;
        }
        foreach ($_FILES['product_img_gallery']['tmp_name'] as $file) {
            $tmp_name[] = $file;
        }
        foreach ($_FILES['product_img_gallery']['error'] as $file) {
            $error[] = $file;
        }
        foreach ($_FILES['product_img_gallery']['type'] as $file) {
            $ext[] = $file;
        }
        foreach ($_FILES['product_img_gallery']['size'] as $file) {
            $size[] = round($file / 1024, 2);
        } 
        //Phần này lấy giá trị ra từng mảng nhỏ
        for ($i = 0; $i < count($name); $i++) {
            $product_gallery = new Image_Gallery();
            $temp = preg_split('/[\/\\\\]+/', $name[$i]);
            $filename = $temp[count($temp) - 1];
            $upload_dir = "../public/images/products/";
            $upload_file = $upload_dir . $filename;
            move_uploaded_file($tmp_name[$i], $upload_file);
            $product_gallery->medium = $filename;
            $product_gallery->product_id = $product->id;
            $product_gallery->save();
            
        }       
        
        $cateIdSeleted = $request->specification_cate;

        $specfications = ProductSpecificationsOptions::all();
        foreach ($specfications as $specfication) {
            if ($specfication->category_id == $cateIdSeleted) {
                $nspecfication = new ProductSpecificationsOptionsValue();

                $nspecfication_value = $specfication->id . "_value";
                $nspecification_name = $specfication->specification_name;

                $nspecfication->specification_name = $nspecification_name;
                $nspecfication->specification_value = $request->$nspecfication_value;
                $nspecfication->product_id = $product->id;

                $nspecfication->save();
            }
        }

        return redirect('/admin/product/list');
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
        $cate = new CategoryController();
        $categorySelect = $cate->res(0);
        $product = Product::with('specfications')->where('products.id', $id)->first();
        return view('admin.products.edit', compact(['product', 'categorySelect']));
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
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;

        $imgpath = $_FILES['product_img']['name'];
        if ($imgpath != '') {
            $target_dir = "../public/images/products/";
            $target_file =  $target_dir . basename($imgpath);
            move_uploaded_file($_FILES['product_img']['tmp_name'], $target_file);
            $product->product_img = $imgpath;
        }

        $product->save();

        $specfication_options = ProductSpecificationsOptions::where('category_id', $product->category_id)->get();

        foreach ($specfication_options as $specfication_option) {
            $specfication = ProductSpecificationsOptionsValue::where('product_id', $id)
                ->where('specification_name', 'LIKE', $specfication_option->specification_name)
                ->first();

            $nspecfication_value = $specfication->id . "_value";
            $specfication->specification_value = $request->$nspecfication_value;

            $nspecfication_value = $specfication->id . "_value";
            $specfication->specification_value = $request->$nspecfication_value;

            $specfication->save();
        }

        return redirect('/admin/product/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $path = '../public/images/admin/products/';
        $product = Product::find($id);
        // unlink($path.$product->product_img);
        $product->delete();
        return redirect('/admin/product/list');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllVariation($id)
    {
        $product = Product::with('combinations')->where('products.id', $id)->first();

        //    dd($product);
        return view('admin.products.variations', compact('product'));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productDetail($id)
    {
        $previews = Preview::where('product_id',$id)->get();
        $slider = Slider::first()->orderBy('slider.created_at', 'DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at', 'DESC')->paginate(1);
        $product = Product::with(['category', 'variations', 'variation_value', 'combinations', 'images', 'specfications'])
        ->where('products.id', $id)->first();

        $similarProducts = Product::with(['category'])
        ->where('products.category_id', $product->category_id)
        ->where('products.id', '!=', $id)
        ->get();

        return view('client.products.product_details', compact(['product', 'similarProducts','previews','banner','slider']));
    }


    public function deleteVariation($id, Request $request)
    {
        $del = Combinations::find($id);
        $idproduct = $del->product_id;
        $del->delete();
        return $this->getAllVariation($idproduct);
    }
    public function editAllVariation($id)
    {
        $detailVar = Combinations::find($id);
        $product = Product::with('combinations')->where('products.id', $id)->first();
        $variation = ProductSpecificationsOptions::find($id);
        return view('admin.variation.edit', compact('detailVar', 'product', 'variation'));
    }
}