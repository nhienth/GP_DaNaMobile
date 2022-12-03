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
use App\Models\WishList;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search_product_by_cate()
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

    public function filter_view()
    {
        $keywords = $_GET['view_selected'];
        $categories = Category::all();
        $products = Product::all();
        if ($keywords == 1) {
            $products = Product::with('category')->orderBy('products.product_view', 'desc')->paginate(5);
            return view('admin.products.list')->with(compact('products', 'categories'));
        } else if ($keywords == 2) {
            $products = Product::with('category')->orderBy('products.product_view', 'asc')->paginate(5);
            return view('admin.products.list')->with(compact('products', 'categories'));
        } else {
            $products = Product::with('category')->orderBy('products.id', 'asc')->paginate(5);
            return view('admin.products.list')->with(compact('products', 'categories'));
        }
    }

    public function filter_status()
    {
        $keywords = $_GET['status_selected'];
        $categories = Category::all();
        $products = Product::where('product_status', '=', $keywords)->paginate(5);
        if ($keywords != 2) {
            return view('admin.products.list')->with(compact('products', 'categories'));
        } else {
            $products = Product::with('category')->paginate(5);
            return view('admin.products.list')->with(compact('products', 'categories'));
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
        $specfications = ProductSpecificationsOptions::all();
        $cate = new CategoryController();
        $categorySelect = $cate->res(0);
        $product = Product::with('specfications')->where('products.id', $id)->first();
        return view('admin.products.edit', compact(['product', 'categorySelect', 'specfications']));
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
        $product = Product::with(['category', 'variations', 'variation_value', 'combinations', 'images', 'specfications'])->where('products.id', $id)->first();
        $similarProducts = Product::with(['category'])
            ->where('products.category_id', $product->category_id)
            ->where('products.id', '!=', $id)
            ->take(6)
            ->get();
        // $similarProducts = Product::
        // take(6)
        // ->get();
        $minPrice = $product->combinations{0}->price;
        $maxPrice = $product->combinations{0}->price;

        foreach ($product->combinations as $pro) {

            if($minPrice > $pro->price) {
                $minPrice = $pro->price;
            } 

            if($maxPrice < $pro->price) {
                $maxPrice = $pro->price;
            }
        }

        $product['minprice'] = $minPrice;
        $product['maxprice'] = $maxPrice;

        return view('client.products.product_details', compact(['product', 'similarProducts', 'previews']));
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

    public function addToCart($id)
    {
        $product = Combinations::find($id);
        $product_name_id = $product->product_id;
        $combi_id = $product->id;
        $productName = Product::find($product_name_id);
        $name = $productName->product_name;
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $name . $product->combination_string,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->combination_image,
                'id_combi' => $combi_id,
            ];
        }
        session()->put('cart', $cart);
        return view('client.shop.cart')->with('success', 'Product added to cart');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCart($id_combi, Request $request)
    {
        $cart = session()->get(key: "cart");

        $cart[$id_combi]["quantity"] = $request->quantityNew;
        session()->put('cart', $cart);
        return view('client.shop.cart')->with('success', 'Product added to cart');
    }
    public function deleteCart($id_combi)
    {

        $carts = session()->get(key: "cart");
        unset($carts[$id_combi]);
        session()->put('cart', $carts);
        return view('client.shop.cart')->with('success', 'Product added to cart');
    }

    public function addToCompare($id){
       
        // $product_combi = Combinations::find($id);
        $product_combi = Combinations::with('product')->where('products_combinations.id', $id)->first();

        $product_spec = Product::with(['category', 'variations', 'variation_value', 'combinations', 'images', 'specfications'])
        ->where('products.id', $product_combi->product_id)->first()->specfications;
    
        $product_name_id = $product_combi->product_id;
        $productName = Product::find($product_name_id);
        $name = $productName->product_name;
        $product_compare_1 = session()->get('product_compare_1', []);
        $product_compare_1[$id] = [
            "id" => $id,
            "name" => $name . $product_combi->combination_string,
            "quantity" => $product_combi->avilableStock,
            "price" => $product_combi->price,
            "image" => $product_combi->combination_image,
            "sku" => $product_combi->sku,
           "specfications" => $product_spec,
        ];
        session()->put('product_compare_1', $product_compare_1);    
        return view('client.shop.compare')->with('success', 'Product added to cart');

    }

    public function deleteCompare($id){
        $product_compare_1 = session()->get('product_compare_1', []);
        unset($product_compare_1[$id]);
        session()->put('product_compare_1', $product_compare_1);
        return view('client.shop.compare');
        
    }

    public function minPriceProduct($arrayPro) {
       
        foreach ($arrayPro as $pro) {
            $minPrice = $pro->combinations{0}->price;
            foreach ($pro->combinations as $item) {
                if($minPrice > $item->price) {
                    $minPrice = $item->price;
                }
            }

            $pro['minPrice'] = $minPrice;
        }
       
    }

    public function productbyCate($id, Request $request){
        $recommendProducts = Product::with(['category','combinations'])
        ->orderBy('products.product_view', 'desc')
        ->take(9)
        ->get();

        $productList = Product::with(['category','combinations'])
        ->where('products.category_id', $id)
        ->get();

        $latestProducts = Product::with(['category','combinations'])
        ->orderBy('products.id', 'desc')
        ->take(5)
        ->get();

        $this->minPriceProduct($recommendProducts);
        $this->minPriceProduct($productList);
        $this->minPriceProduct($latestProducts);


        return view('client.products.product_ bycate', compact(['recommendProducts','productList','latestProducts' ]));
    }


    public function searchProduct(Request $request) {
        $keyword = $request->keyword;
        $recommendProducts = Product::with(['category','combinations'])
        ->orderBy('products.product_view', 'desc')
        ->take(9)
        ->get();

        $productList = Product::with(['category','combinations'])
        ->where('products.product_name', 'LIKE', '%'.$keyword.'%')
        ->orderBy('products.id', 'desc')
        ->get();


        $latestProducts = Product::with(['category','combinations'])
        ->orderBy('products.id', 'desc')
        ->take(5)
        ->get();

        $this->minPriceProduct($recommendProducts);
        $this->minPriceProduct($productList);
        $this->minPriceProduct($latestProducts);


        return view('client.products.product_ bycate', compact(['recommendProducts','productList','latestProducts' ]));
    }

 



    public function addWishlist($id)
    {
        $user_id = Auth::user()->id;

        $checkIsset = false;
        $showWl = WishList::where("wishlists.user_id", $user_id)->get();
        $product = Combinations::with(['product'])
            ->where('products_combinations.id', $id)
            ->first();

        foreach ($showWl as $item) {

            if ($item->product_id == $product->id) {
                $checkIsset = true;
                break;
            }
        }
        if ($checkIsset) {
            return redirect()->route("listWishlist");
        }
        $productWishList = new WishList();
        $productWishList->name = $product->product->product_name. ' -' .$product->combination_string;
        $productWishList->image = $product->combination_image; 
        $productWishList->price = $product->price; 
        $productWishList->product_id  = $product->id;
        $productWishList->user_id  = Auth::user()->id;
        $productWishList->save();
        return redirect()->route("listWishlist");
    }
    public function showWishList()
    {
        $id = Auth::user()->id;
        $showWl = WishList::where("wishlists.user_id", $id)->get();
        return view('client.products.wishlist', compact("showWl"));
    }
    public function deleteWishList($id)
    {
        $product = WishList::find($id);
        $product->delete();
        return redirect()->route('listWishlist');
    }


}