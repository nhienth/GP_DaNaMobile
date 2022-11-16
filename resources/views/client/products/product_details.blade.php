@extends('client.layouts.master')
@section('main')
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Trang
                                chủ</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                href="../shop/shop.html">{{$product->category->category_name}}</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                            {{$product->product_name}}</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->
    <div class="container">
        <!-- Single Product Body -->
        <div class="mb-xl-14 mb-6" style="color:black">
            <div class="row">
                <div class="col-md-5 mb-4 mb-md-0">
                    <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" data-infinite="true"
                        data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                        data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                        data-nav-for="#sliderSyncingThumb">

                        @foreach ($product->images as $productImage)

                        <div class="js-slide">
                            <img class="img-fluid" src="{{asset('images/products/'.$productImage->medium)}}"
                                alt="Image Description">
                        </div>
                        @endforeach



                    </div>

                    <div id="sliderSyncingThumb"
                        class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                        data-infinite="true" data-slides-show="5" data-is-thumbs="true"
                        data-nav-for="#sliderSyncingNav">
                        @foreach ($product->images as $productImage)
                        <div class="js-slide combi-image-js" name="combi-image-js" style="cursor: pointer;">
                            <input type="hidden" name="js-name-combiImg" value="{{$productImage->medium}}">
                            <img class="img-fluid" src="{{asset('images/products/'.$productImage->medium)}}"
                                alt="Image Description">
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-7 mb-md-6 mb-lg-0">
                    <div class="mb-2">
                        <div class="border-bottom mb-3 pb-md-1 pb-3">
                            <a href="#"
                                class="font-size-12 text-gray-5 mb-2 d-inline-block">{{$product->category->category_name}}</a>
                            <h2 class="font-size-25 text-lh-1dot2">{{$product->product_name}}</h2>
                            <div class="mb-2">
                                <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                    <div class="text-warning mr-2">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star text-muted"></small>
                                    </div>
                                    <span class="text-secondary font-size-13">(3 customer reviews)</span>
                                </a>
                            </div>
                            <div class="d-md-flex align-items-center">
                                <a href="#" class="max-width-150 ml-n2 mb-2 mb-md-0 d-block"><img class="img-fluid"
                                        src="{{asset('client/assets/img/200X60/img1.png')}}"
                                        alt="Image Description"></a>
                                <div class="ml-md-3 text-gray-9 font-size-14">Availability: <span
                                        class="text-green font-weight-bold">26 in stock</span></div>
                            </div>
                        </div>
                        <div class="flex-horizontal-center flex-wrap mb-4">
                            <button class="wishlist_btn" onclick="addWishList()"><i
                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </button>
                            <a href="#" class="text-gray-6 font-size-13 ml-2"><i
                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                        </div>
                        <div class="mb-2">
                            <ul class="font-size-14 pl-3 ml-1 text-gray-110">
                                @foreach ($product->specfications as $productSpec)
                                <li>{{$product->specification_name}} : {{$product->specification_value}}</li>
                                @endforeach
                            </ul>
                        </div>

                        <p><strong>SKU</strong>: FW511948218</p>
                        <div class="mb-4">
                            <div class="d-flex align-items-baseline">
                                {{-- <ins class="font-size-36 text-decoration-none">$1,999.00</ins>
                                <del class="font-size-20 ml-2 text-gray-6">$2,299.00</del> --}}
                                <span id="price_product" class="font-size-36 text-decoration-none">$1,999.00</span>
                            </div>
                        </div>
                        <div class="border-top border-bottom py-3 mb-4">
                            @foreach ($product->combinations as $productCombi)
                            <div>
                            <input type="hidden" name="combination_string"
                                value="{{$productCombi->combination_string}}">
                            <input type="hidden" name="price" value="{{$productCombi->price}}">
                            <input type="hidden" name="combination_image" value="{{$productCombi->combination_image}}">
                            <input type="hidden" name="productCombi_Id" value="{{$productCombi->id}}"/>
                            </div>
                            @endforeach
                            <div class="d-flex align-items-center">

                                <div>
                                    @foreach ($product->variations as $variation)
                                    <div>

                                        <label for="">{{$variation->variation_name}}</label>
                                        @php
                                        $variationsIsset = [];
                                        @endphp

                                        @foreach ($product->variation_value as $item)
                                        @if ($variation->variation_name === $item->variation_name)

                                        @if (!in_array($item->variation_value, $variationsIsset))

                                        <input type="radio" class="js-change-variation" name="{{$item->variation_name}}"
                                            id="{{$item->variation_value}}" value="{{$item->variation_value}}">
                                        <label for="{{$item->variation_value}}">{{$item->variation_value}}</label>

                                        @endif

                                        @php
                                        $variationsIsset[] = $item->variation_value;
                                        @endphp


                                        @endif
                                        @endforeach
                                    </div>

                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex align-items-end mb-3">
                            <div class="max-width-150 mb-4 mb-md-0">
                                <h6 class="font-size-14">Quantity</h6>
                                <!-- Quantity -->
                                <div class="border rounded-pill py-2 px-3 border-color-1">
                                    <div class="js-quantity row align-items-center">
                                        <div class="col">
                                            <input
                                                class="js-result form-control h-auto border-0 rounded p-0 shadow-none"
                                                type="text" value="1">
                                        </div>
                                        <div class="col-auto pr-1">
                                            <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                href="javascript:;">
                                                <small class="fas fa-minus btn-icon__inner"></small>
                                            </a>
                                            <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                href="javascript:;">
                                                <small class="fas fa-plus btn-icon__inner"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Quantity -->
                            </div>
                            <div class="ml-md-3">
                                <a href="{{url('cart/add/'.$productCombi->id)}}" class="btn px-5 btn-primary-dark transition-3d-hover" id="addtocart"><i
                                        class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product Body -->
       <!-- Single Product Tab -->
       <div class="mb-8">
        <div class="position-relative position-md-static px-md-6">
            <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0"
                id="pills-tab-8" role="tablist">
                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                    <a class="nav-link active" id="Jpills-one-example1-tab" data-toggle="pill"
                        href="#Jpills-one-example1" role="tab" aria-controls="Jpills-one-example1"
                        aria-selected="true">Sản phẩm cùng loại</a>
                </li>
                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                    <a class="nav-link" id="Jpills-two-example1-tab" data-toggle="pill" href="#Jpills-two-example1"
                        role="tab" aria-controls="Jpills-two-example1" aria-selected="false">Mô tả</a>
                </li>
                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                    <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill"
                        href="#Jpills-three-example1" role="tab" aria-controls="Jpills-three-example1"
                        aria-selected="false">Thông số sản phẩm</a>
                </li>
                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                    <a class="nav-link" id="Jpills-four-example1-tab" data-toggle="pill" 
                    href="#Jpills-four-example1" role="tab" aria-controls="Jpills-four-example1"
                     aria-selected="false">Nhận xét</a>
                </li>

            </ul>
        </div>
        <!-- Tab Content -->
        <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9" style="color: black">
            <div class="tab-content" id="Jpills-tabContent">
                <div class="tab-pane fade active show" id="Jpills-one-example1" role="tabpanel"
                    aria-labelledby="Jpills-one-example1-tab">
                    <div class="row no-gutters">
                        <div class="col mb-6 mb-md-0">
                            <ul
                                class="row list-unstyled products-group no-gutters border-bottom border-md-bottom-0">
                                @foreach ($similarProducts as $similarProduct)
                                <li
                                    class="col-4 col-md-4 col-xl-2gdot5 product-item remove-divider-sm-down border-0">
                                    <div class="product-item__outer h-100">
                                        <div class="remove-prodcut-hover product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2 d-none d-md-block"><a href=""
                                                        class="font-size-12 text-gray-5">{{$similarProduct->category->category_name}}</a>
                                                </div>
                                                <h5 class="mb-1 product-item__title d-none d-md-block"><a
                                                        href="{{url('product/detail',[$similarProduct->id])}}"
                                                        class="text-blue font-weight-bold">{{$similarProduct->product_name}}</a>
                                                </h5>
                                                <div class="mb-2">
                                                    <a href="{{url('product/detail',[$similarProduct->id])}}"
                                                        class="d-block text-center"><img class="img-fluid"
                                                         src="{{asset('images/products/'.$similarProduct->product_img)}}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="flex-center-between mb-1 d-none d-md-block">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">$685,00</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach



                            </ul>
                            <div
                                class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <input class="form-check-input" type="checkbox" value="" id="inlineCheckbox1"
                                    checked disabled>
                                <label class="form-check-label mb-1" for="inlineCheckbox1">
                                    <strong>This product: </strong> Ultra Wireless S50 Headphones S50 with Bluetooth
                                    - <span class="text-red font-size-16">$35.00</span>
                                </label>
                            </div>
                            <div
                                class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1"
                                    checked>
                                <label class="form-check-label mb-1 text-blue" for="inlineCheckbox2">
                                    <span class="text-decoration-on cursor-pointer-on">Universal Headphones Case in
                                        Black</span> - <span class="text-red font-size-16">$159.00</span>
                                </label>
                            </div>
                            <div
                                class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2"
                                    checked>
                                <label class="form-check-label mb-1 text-blue" for="inlineCheckbox3">
                                    <span class="text-decoration-on cursor-pointer-on">Headphones USB Wires</span> -
<span class="text-red font-size-16">$50.00</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="mr-xl-15">
                                <div class="mb-3">
                                    <div class="text-red font-size-26 text-lh-1dot2">$244.00</div>
                                    <div class="text-gray-6">for 3 item(s)</div>
                                </div>
                                <a href="#"
                                    class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Add
                                    all to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Jpills-two-example1" role="tabpanel"
                    aria-labelledby="Jpills-two-example1-tab">
                    {{-- <h3 class="font-size-24 mb-3">Perfectly Done</h3> --}}
                    <div class="row">
                        <?php echo $product->product_desc ?>
                    </div>
                    <ul class="nav flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>SKU:</strong>
                            <span class="sku">FW511948218</span>
                        </li>
                        <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                        <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Category:</strong>
                            <a href="#" class="text-blue">Headphones</a>
                        </li>
                        <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                        <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Tags:</strong> <a
                                href="#" class="text-blue">Fast</a>, <a href="#" class="text-blue">Gaming</a>, <a
                                href="#" class="text-blue">Strong</a></li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel"
                    aria-labelledby="Jpills-three-example1-tab">
                    <div class="mx-md-5 pt-1" style="color: black">
                        {{-- <h3 class="font-size-18 mb-4">Technical Specifications</h3> --}}
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    {{-- <tr>
                                    <th class="px-4 px-xl-5 border-top-0">Brand</th>
                                        <td class="border-top-0">Apple</td>
                                    </tr> --}}

                                    @foreach ($product->specfications as $productSpec)
                                    <tr>
                                        <th class="px-4 px-xl-5">{{$productSpec->specification_name}}</th>
                                        <td>{{$productSpec->specification_value}}</td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Jpills-four-example1" role="tabpanel"
                aria-labelledby="Jpills-four-example1-tab">
                <div class="row mb-8">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h3 class="font-size-18 mb-6">Based on 3 reviews</h3>
                            <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">4.3</h2>
                            <div class="text-lh-1">overall</div>
                        </div>

                                <!-- Ratings -->
                                <ul class="list-unstyled">
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">205</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 53%;"
                                                        aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">55</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 20%;"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">23</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-muted">0</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 1%;"
                                                        aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">4</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Ratings -->
                            </div>
                            <div class="col-md-6" style="color:black">
                                <h3 class="font-size-18 mb-5">Add a review</h3>
                                <!-- Form -->
                                <p class="text-gray-90"> Bạn cần đăng nhập để đánh giá sản phẩm<span class="text-dark" style="color: red">*</span></p>
                                <form class="js-validate" action="{{route('preview',$product->id)}}" method="POST">
                                    @csrf
                                    @if (Auth::check())
                                    <div class="row align-items-center mb-4">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="rating" class="form-label mb-0">Your Review</label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <a href="#" class="d-block">
                                                <div class="text-warning text-ls-n2 font-size-16">
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="js-form-message form-group mb-3 row">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="descriptionTextarea" class="form-label">Your Review</label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea class="form-control p-5" rows="4" name="review" placeholder=""></textarea>
                                        </div>
                                    </div>                                                                
                                    <div class="row">
                                        <div class="offset-md-4 offset-lg-3 col-auto">
                                            <button type="submit" class="btn btn-primary-dark btn-wide transition-3d-hover">Add Review</button>
                                        </div>
                                    </div>
                                    @endif
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                       <!-- Review -->
                       @foreach ($previews as $preview)                      
                       <div class="border-bottom border-color-1 pb-4 mb-4" style="color: black">
                        <div class="u-xl-avatar mr-md-4 mb-4 mb-md-0">
                            <img class="img-fluid rounded-circle" src="{{asset('/images/user/default.jpg')}}" alt="Image Description" width="50px">
                        </div> 
                        <!-- Review Rating -->
                        <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="far fa-star text-muted"></small>
                                <small class="far fa-star text-muted"></small>
                            </div>
                        </div>
                        <!-- End Review Rating -->
                        <p class="text-gray-90">{{$preview->review}}</p>
                        <!-- Reviewer -->
                        <div class="mb-2">
                            <strong>{{$preview->user->name}}</strong>
                            <span class="font-size-13 text-gray-23">{{$preview->created_at->format('d/m/Y')}}</span>
                        </div>
                        <!-- End Reviewer -->
                    </div>
                    @endforeach
                    <!-- End Review -->                                       
                        </div>                                          
                    </div>
                </div>
            </div>
            <!-- End Tab Content -->
        </div>
        <!-- End Single Product Tab -->
        <!-- Related products -->
        <div class="mb-6" style="color: black">
            <div
                class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                <h3 class="section-title mb-0 pb-2 font-size-22">Related products</h3>
            </div>
            <ul class="row list-unstyled products-group no-gutters">
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree
                                        Full base audio</a></h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{asset('client/')}}assets/img/212X200/img1.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a>
                                </h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{asset('client/assets/img/212X200/img2.jpg')}}"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                        <ins class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                        <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2
                                            299,00</del>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{asset('client/assets/img/212X200/img3.jpg')}}"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-md-lg">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{asset('client/assets/img/212X200/img4.jpg')}}"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-xl">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{asset('client/assets/img/212X200/img5.jpg')}}"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li
                    class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-wd d-xl-none d-wd-block">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a>
                                </h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{asset('client/assets/img/212X200/img2.jpg')}}"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                        <ins class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                        <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2
                                            299,00</del>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Related products -->
        <!-- Brand Carousel -->
        <div class="mb-8">
            <div class="py-2 border-top border-bottom">
                <div class="js-slick-carousel u-slick my-1" data-slides-show="5" data-slides-scroll="1"
                    data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                    data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                    data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right" data-responsive='[{
                        "breakpoint": 992,
                        "settings": {
                            "slidesToShow": 2
                        }
                    }, {
                        "breakpoint": 768,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }, {
                        "breakpoint": 554,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }]'>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{asset('client/assets/img/200X60/img1.png')}}" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{asset('client/assets/img/200X60/img2.png')}}" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{asset('client/assets/img/200X60/img3.png')}}" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{asset('client/assets/img/200X60/img4.png')}}" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{asset('client/assets/img/200X60/img5.png')}}" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{asset('client/assets/img/200X60/img6.png')}}" alt="Image Description">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Carousel -->
    </div>
</main>

@endsection

<script>
    setTimeout(() => {
        let variSeleted;
        let arr = ['a', 'b'];
        let arrImgInput = [];
        let priceHtml = document.getElementById("price_product");
        let addCartButton = document.getElementById("addtocart");


        let combiImageList = document.querySelectorAll('.combi-image-js');
            combiImageList.forEach(combiImage => {
                arrImgInput.push(combiImage.firstElementChild);
            });



        let productsCombination = document.getElementsByName('combination_string')
        let radioList = document.querySelectorAll(".js-change-variation");
            radioList.forEach(element => {
                element.addEventListener("change", function () {
                if (this.name == "Bộ nhớ") {
                    arr[1] = this.value;
                } else {
                    arr[0] = this.value;
                }
                variSeleted = arr.join(" ");

                productsCombination.forEach((pro) => {
                    if (variSeleted == pro.value.trim()) {
                        priceHtml.innerHTML = `$${pro.nextElementSibling.value}`;
                        let combiId = pro.parentElement.lastElementChild.value;
                        addCartButton.href=`http://127.0.0.1:8000/cart/add/${combiId}`;
                        

                        let imgCombi = pro.nextElementSibling.nextElementSibling;

                        arrImgInput.forEach(imgInput => {
                            if(imgInput.value === imgCombi.value) {
                                imgInput.parentElement.click();                              
                            }
                        });
                    }
                });
            });
        });
    
    }, 2000);

    function addWishList(){
        alert('anh canh');
    }

</script>


