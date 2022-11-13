<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\Product;
use App\Models\User;
use App\Models\Combinations;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $html = '';

    public function index()
    {
        $categories = Category::all();
        $categorySelect = $this->res(0);
        $categorylist = Category::orderBy('categories.created_at','DESC')->paginate(4);
        foreach ($categories as $category) {
            $parent_id = $category->parent_id;
            $partenCateName = $this->getCategoryName($parent_id);
            $category['parent_cate'] = $partenCateName;
        }
        $slider = Slider::first()->orderBy('slider.created_at','DESC')->paginate(1);
        $banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
        $bannerlist = Banner::all();
        // all sản phẩm
        $productsld = Product::with('combinations','category')->orderBy('products.id', 'desc')
            ->take(8)
            ->get();

        $priceArr = [];
        $minPrice = 0;
        $maxPrice = 0;
        foreach ($productsld as $product) {
          foreach ($product->combinations as $productCombi) {
            array_push($priceArr, $productCombi->price);
          
            }
            $minPrice = min($priceArr);
            $maxPrice = max($priceArr);

            $priceArr = [];

            $product['minprice'] = $minPrice;
            $product['maxprice'] = $maxPrice;

        }

        // sản phẩm theo lượt xem
        $view_product = Product::with('combinations','category')->orderBy('products.product_view', 'DESC')
        ->limit(8)
        ->get();//hiển thị theo lượt xem
        $priceArr = [];
        $minPrice = 0;
        $maxPrice = 0;
        foreach ($view_product as $product) {
          foreach ($product->combinations as $productCombi) {
            array_push($priceArr, $productCombi->price);
          
            }
            $minPrice = min($priceArr);
            $maxPrice = max($priceArr);

            $priceArr = [];

            $product['minprice'] = $minPrice;
            $product['maxprice'] = $maxPrice;

        }
        // random
        $random = Product::with('combinations','category')->orderBy(DB::raw('RAND()'))
        ->limit(3)
        ->get();//random ngẫu nhiên 5 bài
        $priceArr = [];
        $minPrice = 0;
        $maxPrice = 0;
        foreach ($random as $product) {
          foreach ($product->combinations as $productCombi) {
            array_push($priceArr, $productCombi->price);
          
            }
            $minPrice = min($priceArr);
            $maxPrice = max($priceArr);

            $priceArr = [];

            $product['minprice'] = $minPrice;
            $product['maxprice'] = $maxPrice;

        }
        

        return view('client.index')->with(compact('categories', 'categorylist', 'view_product', 'slider', 'banner', 'bannerlist', 'productsld', 'random', 'categorySelect'));

    }

    public function getCategoryName($id) {
        if($id != 0) {
            $category = Category::find($id);
            return $category->category_name;
        }
        
    }
    public function res($id, $text = '')
    {
        $data = Category::all();
        foreach ($data as $value) {          
            if ($value['parent_id'] == $id) {    
                $this->html .= '<li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-position="left">
                <a id="basicMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">'.$value['category_name'] . '</a>';
                $this->res_sub($value['id'], $value['id']);
                $this->html .= '</li>';
            }else{
                $this->html .= '</li>';
            }
        }
        return $this->html;
    }

    // public function list($id, $text = '')
    // {
    //     $data = Category::all();
    //     foreach ($data as $list) {          
    //         if ($list['parent_id'] == $id) { 
    //             $this->html .= '<div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
    //                                 <a href="../shop/shop.html" class="d-black text-gray-90">
    //                                     <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
    //                                         <div class="col-6 col-xl-5 col-wd-6 pr-0">
                                                
    //                                         </div>
    //                                         <div class="col-6 col-xl-7 col-wd-6">
    //                                             <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
    //                                                 .$list['getCategoryName'] .
    //                                             </div>
    //                                             <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
    //                                                 Xem sản phẩm
    //                                                 <span class="link__icon ml-1">
    //                                                     <span class="link__icon-inner"><i
    //                                                             class="ec ec-arrow-right-categproes"></i></span>
    //                                                 </span>
    //                                             </div>
    //                                         </div>
    //                                     </div>
    //                                 </a>
    //                             </div>'
                                            
    //                                         ;   
    //             $this->html .= '<li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-position="left">
    //             <a id="basicMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">'.$list['category_name'] . '</a>';
    //             $this->res_sub($list['id'], $list['id']);
    //             $this->html .= '</li>';
    //         }else{
    //             $this->html .= '</li>';
    //         }
    //     }
    //     return $this->html;
    // }


    public function res_sub($id, $id_parent)
    {
        $count = 0;
        $data_sub = Category::all();
        $category = Category::find($id_parent);
        foreach ($data_sub as $value_sub) {
            if ($value_sub['parent_id'] == $id) {  
                $count++;
             }
           
        }
        if($count > 0){
        $this->html .= '<div class="hs-mega-menu vmm-tfw u-header__sub-menu" aria-labelledby="basicMegaMenu">
                                    <div class="vmm-bg">
                                        <img class="img-fluid" src="../../assets/img/500X400/img1.png" alt="">
                                    </div>
                                    <div class="row u-header__mega-menu-wrapper">
                                        <div class="col mb-3 mb-sm-0">
                                            <span class="u-header__sub-menu-title">'.$category->category_name.'</span>
                                            <ul class="u-header__sub-menu-nav-group mb-3">';   
        foreach ($data_sub as $value_sub) {
            if ($value_sub['parent_id'] == $id) {  
                        
                $this->html .= '<li><a class="nav-link u-header__sub-menu-nav-link" href="#">'.$value_sub['category_name'].'</a></li>';    
                   
            }
           
        }
        $this->html .= '                   
                        </ul>
                    </div>
                </div>
            </div>';   
        }
        return $this->html;
     
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
