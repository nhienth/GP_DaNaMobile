{{-- Begin Footer --}}

<?php



use App\Models\Banner;
$banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
$random = [];


?>
<footer>
    <!-- Footer-top-widget -->
    <div class="container d-none d-lg-block mb-3">
        <div class="row">
            <div class="col-wd-3 col-lg-4">
                <div class="widget-column">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18" style="color: black">Sản phẩm gợi ý</h3>
                    </div>
                    <ul class="list-unstyled products-group">
                        @foreach ($random as $randoms)
                            
                        <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                            <div class="col-auto">
                                <a href=""
                                    class="d-block width-75 text-center"><img class="img-fluid"
                                        src="{{asset('images/products/'.$randoms->product_img)}}" alt="Image Description"></a>
                            </div>
                            <div class="col pl-4 d-flex flex-column">
                                <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">{{ $randoms->product_name }}</a></h5>
                                <div class="prodcut-price mt-auto" style="color: black">
                                    <div class="font-size-15">{{$randoms->minprice}}đ</div>
                                </div>
                            </div>
                        </li>

                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-wd-3 col-lg-4">
                <div class="border-bottom border-color-1 mb-5">
                    <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18" style="color: black">Sản phẩm đang giảm giá</h3>
                </div>
                <ul class="list-unstyled products-group">
                    <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                        <div class="col-auto">
                            <a href="../shop/single-product-fullwidth.html" class="d-block width-75 text-center"><img
                                    class="img-fluid" src="{{asset('client/assets/img/75X75/img4.jpg')}}"
                                    alt="Image Description"></a>
                        </div>
                        <div class="col pl-4 d-flex flex-column">
                            <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Yellow Earphones Waterproof with Bluetooth</a>
                            </h5>
                            <div class="prodcut-price mt-auto flex-horizontal-center">
                                <ins class="font-size-15 text-decoration-none">$110.00</ins>
                                <del class="font-size-12 text-gray-9 ml-2">$250.00</del>
                            </div>
                        </div>
                    </li>
                    <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                        <div class="col-auto">
                            <a href="../shop/single-product-fullwidth.html" class="d-block width-75 text-center"><img
                                    class="img-fluid" src="{{asset('client/assets/img/75X75/img5.jpg')}}"
                                    alt="Image Description"></a>
                        </div>
                        <div class="col pl-4 d-flex flex-column">
                            <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Camera C430W 4k Waterproof</a></h5>
                            <div class="prodcut-price mt-auto flex-horizontal-center">
                                <ins class="font-size-15 text-decoration-none">$899.00</ins>
                                <del class="font-size-12 text-gray-9 ml-2">$1200.00</del>
                            </div>
                        </div>
                    </li>
                    <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                        <div class="col-auto">
                            <a href="../shop/single-product-fullwidth.html" class="d-block width-75 text-center"><img
                                    class="img-fluid" src="{{asset('client/assets/img/75X75/img6.jpg')}}"
                                    alt="Image Description"></a>
                        </div>
                        <div class="col pl-4 d-flex flex-column">
                            <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                            <div class="prodcut-price mt-auto flex-horizontal-center">
                                <ins class="font-size-15 text-decoration-none">$2100.00</ins>
                                <del class="font-size-12 text-gray-9 ml-2">$3299.00</del>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-wd-3 col-lg-4">
                <div class="border-bottom border-color-1 mb-5">
                    <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18" style="color: black">Sản phẩm đánh giá hàng đầu</h3>
                </div>
                <ul class="list-unstyled products-group">
                    <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                        <div class="col-auto">
                            <a href="../shop/single-product-fullwidth.html" class="d-block width-75 text-center"><img
                                    class="img-fluid" src="{{asset('client/assets/img/75X75/img7.jpg')}}"
                                    alt="Image Description"></a>
                        </div>
                        <div class="col pl-4 d-flex flex-column">
                            <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Smartwatch 2.0 LTE Wifi Waterproof</a></h5>
                            <div class="text-warning mb-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                            </div>
                            <div class="prodcut-price mt-auto">
                                <div class="font-size-15">$725.00</div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                        <div class="col-auto">
                            <a href="../shop/single-product-fullwidth.html" class="d-block width-75 text-center"><img
                                    class="img-fluid" src="{{asset('client/assets/img/75X75/img8.jpg')}}"
                                    alt="Image Description"></a>
                        </div>
                        <div class="col pl-4 d-flex flex-column">
                            <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">22Mps Camera 6200U with 500GB SDcard</a></h5>
                            <div class="text-warning mb-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="far fa-star text-muted"></small>
                            </div>
                            <div class="prodcut-price mt-auto">
                                <div class="font-size-15">$2999.00</div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                        <div class="col-auto">
                            <a href="../shop/single-product-fullwidth.html" class="d-block width-75 text-center"><img
                                    class="img-fluid" src="{{asset('client/assets/img/75X75/img9.jpg')}}"
                                    alt="Image Description"></a>
                        </div>
                        <div class="col pl-4 d-flex flex-column">
                            <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Full Color LaserJet Pro M452dn</a></h5>
                            <div class="text-warning mb-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="far fa-star text-muted"></small>
                            </div>
                            <div class="prodcut-price mt-auto">
                                <div class="font-size-15">$439.00</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            @foreach($banner as $banners)
            <div class="col-wd-3 d-none d-wd-block">
                <a href="{{$banners->location}}" class="d-block"><img class="img-fluid"
                        src="{{asset('images/banner/'.$banners->banner_img)}}" alt="Image Description"
                        style="width:100%"></a>
            </div>
            @endforeach
        </div>
    </div>
    <!-- End Footer-top-widget -->
    <!-- Footer-newsletter -->
    <div class="bg-primary py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col-auto flex-horizontal-center">
                            <i class="ec ec-newsletter font-size-40"></i>
                            <h2 class="font-size-20 mb-0 ml-3">Đăng nhập để được nhiều ưu đãi</h2>
                        </div>
                        <div class="col my-4 my-md-0">
                            <h5 class="font-size-15 ml-4 mb-0">... và nhận được nhiều phiếu giảm giá <strong>Free ship</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form class="js-validate js-form-message">
                        <label class="sr-only" for="subscribeSrEmail">Địa chỉ email</label>
                        <div class="input-group input-group-pill">
                            <input type="email" class="form-control border-0 height-40" name="email"
                                id="subscribeSrEmail" placeholder="Địa chỉ email" aria-label="Địa chỉ email"
                                aria-describedby="subscribeButton" required
                                data-msg="Please enter a valid email address.">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-dark btn-sm-wide height-40 py-2"
                                    id="subscribeButton">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-newsletter -->
    <!-- Footer-bottom-widgets -->
    <div class="pt-8 pb-4 bg-gray-13">
        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-5">
                    <div class="mb-6">
                        <a href="#" class="d-inline-block">
                                <img src="{{asset('images/logo/dana.png')}}" alt="" srcset="" style="width:300px">
                        </a>
                    </div>
                    <div class="mb-4">
                        <div class="row no-gutters" style="color: black">
                            <div class="col-auto">
                                <i class="ec ec-support text-primary font-size-56"></i>
                            </div>
                            <div class="col pl-3">
                                <div class="font-size-13 font-weight-light">Bạn có thắc mắc gì ? Hãy gọi tôi</div>
                                <a href="tel:+80080018588" class="font-size-20 text-gray-90">(84) 0917 608 264, </a><a
                                    href="tel:+0600874548" class="font-size-20 text-gray-90">(84) 874 548</a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4" style="color: black">
                        <h6 class="mb-1 font-weight-bold">Thông tin liên lạc</h6>
                        <address class="">
                            DaNa Mobile, 55/7 Kiệt 55 Ngũ Hành Sơn, Bắc Mỹ Phú, Ngũ Hành Sơn, Đà Nẵng 550000, Việt Nam
                        </address>
                    </div>
                    <div class="my-4 my-md-4">
                        <ul class="list-inline mb-0 opacity-7">
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                    href="#">
                                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                    href="#">
                                    <span class="fab fa-google btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                    href="#">
                                    <span class="fab fa-twitter btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                    href="#">
                                    <span class="fab fa-github btn-icon__inner"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7" style="color: black">
                    <div class="row">
                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Tìm kiếm nhanh</h6>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Laptops & Computers</a>
                                </li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Cameras &
                                        Photography</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Smart Phones &
                                        Tablets</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Video Games &
                                        Consoles</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">TV & Audio</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Gadgets</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Car Electronic & GPS</a>
                                </li>
                            </ul>
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md mb-4 mb-md-0">
                            <!-- List Group -->
                            <ul
                                class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent mt-md-6">
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Printers & Ink</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Software</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Office Supplies</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Computer Components</a>
                                </li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/product-categories-5-column-sidebar.html">Accesories</a></li>
                            </ul>
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Chăm sóc khách hàng</h6>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                <li><a class="list-group-item list-group-item-action" href="http://127.0.0.1:8000/user/{{ Auth::user()->id }}">Tài khoản của tôi</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="../shop/track-your-order.html">Giỏ hàng</a></li>
                                <li><a class="list-group-item list-group-item-action" href="../shop/wishlist.html">Sản phẩm yêu thích</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="http://127.0.0.1:8000/contact">Dịch vụ khách hàng</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="http://127.0.0.1:8000/contact">Trao đổi</a></li>
                                <li><a class="list-group-item list-group-item-action" href="http://127.0.0.1:8000/contact">FAQs</a>
                                </li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="http://127.0.0.1:8000/contact">Hổ trợ sản phẩm</a></li>
                            </ul>
                            <!-- End List Group -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-bottom-widgets -->
    <!-- Footer-copy-right -->
    <div class="bg-gray-14 py-2">
        <div class="container">
            <div class="flex-center-between d-block d-md-flex" style="color: black">
                <div class="mb-3 mb-md-0">© <a href="#" class="font-weight-bold text-gray-90">DaNa-Mobile</a> - Đã đăng ký bản quyền</div>
                <div class="text-md-right">
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" style="height:30px" src="{{asset('images/user/bao.jpg')}}"
                            alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" style="height:30px" src="{{asset('images/user/thang.jpg')}}"
                            alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" style="height:30px" src="{{asset('images/user/ninh.jpg')}}"
                            alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" style="height:30px" src="{{asset('images/user/nhien.jpg')}}"
                            alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" style="height:30px" src="{{asset('images/user/tuananh.jpg')}}"
                            alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" style="height:30px" src="{{asset('images/user/ducthang.jpg')}}"
                            alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" style="height:30px" src="{{asset('images/user/tien.jpg')}}"
                            alt="Image Description">
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-copy-right -->
</footer>
{{-- End footer --}}

<script>
    let btnCate = document.getElementById('js-header-btn');
    setTimeout(() => {
        btnCate.click();
    }, 1500);
</script>