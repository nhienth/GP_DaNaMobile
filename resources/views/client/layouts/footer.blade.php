{{-- Begin Footer --}}

<?php



use App\Models\Banner;
$banner = Banner::first()->orderBy('banner.created_at','DESC')->paginate(1);
$random = [];


?>
<footer>
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
                            <h5 class="font-size-15 ml-4 mb-0">... và nhận được nhiều phiếu giảm giá <strong>Free
                                    ship</strong></h5>
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
                                @if (Route::has('login'))
                                @auth

                                    <li><a class="list-group-item list-group-item-action" href="http://127.0.0.1:8000/user/{{ Auth::user()->id }}">Tài khoản của tôi</a></li>
                                    <li><a class="list-group-item list-group-item-action" href="{{url('listWishList')}}">Sản
                                        phẩm yêu thích</a></li>
                                    @else

                                    <li><a class="list-group-item list-group-item-action" href="{{ route('login') }}">Đăng nhập</a></li>
                                
                                    @endauth
                                @endif
                                <li><a class="list-group-item list-group-item-action"
                                        href="{{url('/cart/')}}">Giỏ hàng</a></li>
                                
                                <li><a class="list-group-item list-group-item-action"
                                        href="{{url('/contact')}}">Dịch vụ khách hàng</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="{{url('/contact')}}">Trao đổi</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="{{url('/contact')}}">FAQs</a>
                                </li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="{{url('/contact')}}">Hổ trợ sản phẩm</a></li>
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
                <div class="mb-3 mb-md-0">© <a href="#" class="font-weight-bold text-gray-90">DaNa-Mobile</a> - Đã đăng
                    ký bản quyền</div>
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