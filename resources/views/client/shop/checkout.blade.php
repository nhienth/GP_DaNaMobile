@extends('client.layouts.master')
@section('main')
<style>
    .cl-black{
        color: black !important;
    }
</style>
<main id="content" role="main" class="checkout-page">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{url('/')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Thanh toán</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-5">
            <h1 class="text-center" style="color: red; font-weight: 700;">THANH TOÁN</h1>
        </div>
        <!-- Accordion -->
        <div id="shopCartAccordion" class="accordion rounded mb-5">
            <!-- Card -->
            <div class="card border-0">
                <div id="shopCartHeadingOne" class="alert alert-primary mb-0" role="alert" style="color: white;">
                    Phản hồi khách hàng?  <a href="#" class="alert-link" data-toggle="collapse" data-target="#shopCartOne" aria-expanded="false" aria-controls="shopCartOne" style="color: white;">Nhấn vào đây để đăng nhập</a>
                </div>
                <div id="shopCartOne" class="collapse border border-top-0" aria-labelledby="shopCartHeadingOne" data-parent="#shopCartAccordion" style="">
                    <!-- Form -->
                    <form class="js-validate p-5">
                        <!-- Title -->
                        <div class="mb-5">
                            <p class="text-gray-90 mb-2">Chào mừng trở lại! Đăng nhập vào tài khoản của bạn.</p>
                            <p class="text-gray-90">Nếu bạn đã mua sắm với chúng tôi trước đây, vui lòng nhập thông tin chi tiết của bạn dưới đây. Nếu bạn là khách hàng mới, vui lòng chuyển sang phần Thanh toán & Vận chuyển.</p>
                        </div>
                        <!-- End Title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">Địa chỉ Email</label>
                                    <input type="email" class="form-control" name="email" id="signinSrEmailExample3" placeholder="Email address" aria-label="Email address" required
                                    data-msg="Please enter a valid email address."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                </div>
                                <!-- End Form Group -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrPasswordExample2">Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" id="signinSrPasswordExample2" placeholder="********" aria-label="********" required
                                    data-msg="Your password is invalid. Please try again."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                </div>
                                <!-- End Form Group -->
                            </div>
                        </div>

                        <!-- Checkbox -->
                        <div class="js-form-message mb-3">
                            <div class="custom-control custom-checkbox d-flex align-items-center">
                                <input type="checkbox" class="custom-control-input" id="rememberCheckbox" name="rememberCheckbox" required
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                                <label class="custom-control-label form-label cl-black" for="rememberCheckbox">
                                    Ghi nhớ tài khoản
                                </label>
                            </div>
                        </div>
                        <!-- End Checkbox -->

                        <!-- Button -->
                        <div class="mb-1">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5">Đăng nhập</button>
                            </div>
                            <div class="mb-2">
                                <a class="text-blue" href="#">Quên mật khẩu?</a>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>
                    <!-- End Form -->
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Accordion -->

        <!-- Accordion -->
        <div id="shopCartAccordion1" class="accordion rounded mb-6">
            <!-- Card -->
            <div class="card border-0">
                <div id="shopCartHeadingTwo" class="alert alert-primary mb-0" role="alert" style="color: white;">
                    Có phiếu giảm giá?  <a href="#" class="alert-link" data-toggle="collapse" data-target="#shopCartTwo" aria-expanded="false" aria-controls="shopCartTwo" style="color: white;">Nhấn vào đây để nhập mã của bạn</a>
                </div>
                <div id="shopCartTwo" class="collapse border border-top-0" aria-labelledby="shopCartHeadingTwo" data-parent="#shopCartAccordion1" style="">
                    <form class="js-validate p-5" novalidate="novalidate">
                        <p class="w-100 text-gray-90" >Nếu bạn có mã giảm giá, vui lòng áp dụng nó bên dưới.</p>
                        <div class="input-group input-group-pill max-width-660-xl">
                            <input type="text" class="form-control" name="name" placeholder="Coupon code" aria-label="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-block btn-dark font-weight-normal btn-pill px-4">
                                    <i class="fas fa-tags d-md-none"></i>
                                    <span class="d-none d-md-inline">Áp dụng phiếu giảm giá</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Accordion -->
        <form class="js-validate" novalidate="novalidate" action="{{route('done')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                    <div class="pl-lg-3 ">
                        <div class="bg-gray-1 rounded-lg">
                            <!-- Order Summary -->
                            <div class="p-4 mb-4 checkout-table">
                                <!-- Title -->
                                <div class="border-bottom border-color-1 mb-5">
                                    <h3 class="section-title mb-0 pb-2 font-size-25 cl-black">Đơn hàng của bạn</h3>
                                </div>
                                <!-- End Title -->

                                <!-- Product Content -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-total">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php $subTotal = 0;
                                                $ship = 100;
                                                $total = 0;
                                        ?>
                                        @foreach ( session('cart') as $cart )
                                        <?php $subTotal += $cart['price']*$cart['quantity'] ?>
                                        <tr class="cart_item">
                                            <td>{{$cart['name']}}&nbsp;<strong class="product-quantity">× {{$cart['quantity']}}</strong></td>
                                            <td>{{$cart['price']*$cart['quantity']}}</td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tổng tiền tạm thời</th>
                                            <td><?= number_format($subTotal) ?>đ</td>
                                        </tr>
                                        <tr>
                                            <th>Phí vận chuyển</th>
                                            <td><?= number_format($ship) ?>đ</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng</th>
                                            <td><strong><?= number_format($subTotal + $ship) ?>đ</strong></td>
                                            <input type="hidden" value="<?= $subTotal + $ship ?>" name="total_amount">
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- End Product Content -->
                                <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                    <!-- Basics Accordion -->
                                    <div id="basicsAccordion1">
                                        <!-- Card -->
                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                            <div class="p-3" id="basicsHeadingOne">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="stylishRadio1" name="stylishRadio" checked>
                                                    <label class="custom-control-label form-label cl-black" for="stylishRadio1"
                                                        data-toggle="collapse"
                                                        data-target="#basicsCollapseOnee"
                                                        aria-expanded="true"
                                                        aria-controls="basicsCollapseOnee">
                                                        Chuyển khoản trực tiếp
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="basicsCollapseOnee" class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                aria-labelledby="basicsHeadingOne"
                                                data-parent="#basicsAccordion1">
                                                <div class="p-4 cl-black ">
                                                    Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho đến khi số tiền trong tài khoản của chúng tôi được thanh toán.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->

                                        <!-- Card -->
                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                            <div class="p-3" id="basicsHeadingTwo">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="secondStylishRadio1" name="stylishRadio">
                                                    <label class="custom-control-label form-label cl-black" for="secondStylishRadio1"
                                                        data-toggle="collapse"
                                                        data-target="#basicsCollapseTwo"
                                                        aria-expanded="false"
                                                        aria-controls="basicsCollapseTwo">
                                                        Check payments
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="basicsCollapseTwo" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                aria-labelledby="basicsHeadingTwo"
                                                data-parent="#basicsAccordion1">
                                                <div class="p-4 cl-black">
                                                    Vui lòng gửi séc tới Tên cửa hàng, Phố cửa hàng, Thị trấn cửa hàng, Bang / Hạt cửa hàng, Mã bưu điện cửa hàng.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->

                                        <!-- Card -->
                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                            <div class="p-3" id="basicsHeadingThree">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input " id="thirdstylishRadio1" name="stylishRadio">
                                                    <label class="custom-control-label form-label cl-black" for="thirdstylishRadio1"
                                                        data-toggle="collapse"
                                                        data-target="#basicsCollapseThree"
                                                        aria-expanded="false"
                                                        aria-controls="basicsCollapseThree">
                                                        Thanh toán khi giao hàng
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="basicsCollapseThree" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                aria-labelledby="basicsHeadingThree"
                                                data-parent="#basicsAccordion1">
                                                <div class="p-4 cl-black">
                                                    Thanh toán bằng tiền mặt khi giao hàng.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->

                                        <!-- Card -->
                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                            <div class="p-3" id="basicsHeadingFour">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="FourstylishRadio1" name="stylishRadio">
                                                    <label class="custom-control-label form-label cl-black" for="FourstylishRadio1"
                                                        data-toggle="collapse"
                                                        data-target="#basicsCollapseFour"
                                                        aria-expanded="false"
                                                        aria-controls="basicsCollapseFour">
                                                        PayPal / <a href="#" class="text-blue cl-black">PayPal là gì?</a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="basicsCollapseFour" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                aria-labelledby="basicsHeadingFour"
                                                data-parent="#basicsAccordion1">
                                                <div class="p-4 cl-black">
                                                    Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản PayPal.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>
                                    <!-- End Basics Accordion -->
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck10" required
                                            data-msg="Please agree terms and conditions."
                                            data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                        <label class="form-check-label form-label cl-black" for="defaultCheck10">
                                            Tôi đã đọc và đồng ý <a href="#" class="text-blue">các điều khoản và điều kiện </a>
                                            <span class="text-danger">*</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">Đặt hàng</button>
                            </div>
                            <!-- End Order Summary -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 order-lg-1">
                    <div class="pb-7 mb-7">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25 cl-black">Chi tiết thanh toán</h3>
                        </div>
                        <!-- End Title -->

                        <!-- Billing Form -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label cl-black">
                                        Họ và tên
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" value="{{$user->name}}" class="form-control" name="fullname" placeholder="Jack" aria-label="Jack" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                </div>
                                <!-- End Input -->
                            </div>

                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label cl-black">
                                        Tên công ty (Nếu có)
                                    </label>
                                    <input type="text" class="form-control" name="companyName" placeholder="Company Name" aria-label="Company Name" data-msg="Please enter a company name." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="w-100"></div>

                            

                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label cl-black">
                                        Địa chỉ
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="address" class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select country." data-error-class="u-has-error" data-success-class="u-has-success"
                                        data-live-search="true"
                                        data-style="form-control border-color-1 font-weight-normal">
                                        @foreach($user->user_addresses as $address)
                                            <option value="{{$address->id}}">{{$address->completeAddress}}
                                              
                                                @if ($address->name_address == 0)
                                                    ( Nhà riêng )
                                                @else
                                                    ( Văn phòng )
                                                @endif
                                            </option>
                                        @endforeach                                
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label cl-black">
                                        Địa chỉ Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" name="emailAddress" placeholder="jackwayley@gmail.com" aria-label="jackwayley@gmail.com" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label cl-black">
                                        Điện thoại
                                    </label>
                                    <input type="text" name="phone" value="0123" class="form-control" placeholder="+1 (062) 109-9222" aria-label="+1 (062) 109-9222" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>
                        </div>
                    
                        <!-- End Billing Form -->

                        <!-- Accordion -->
                        <div id="shopCartAccordion2" class="accordion rounded mb-6">
                            <!-- Card -->
                            <div class="card border-0">
                                <div id="shopCartHeadingThree" class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="createAnaccount" name="createAnaccount" >
                                    <label class="custom-control-label form-label cl-black" for="createAnaccount" data-toggle="collapse" data-target="#shopCartThree" aria-expanded="false" aria-controls="shopCartThree">
                                        Tạo tài khoản?
                                    </label>
                                </div>
                                <div id="shopCartThree" class="collapse" aria-labelledby="shopCartHeadingThree" data-parent="#shopCartAccordion2" style="">
                                    <!-- Form Group -->
                                    <div class="js-form-message form-group py-5">
                                        <label class="form-label cl-black" for="signinSrPasswordExample1">
                                            Tạo mật khẩu
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="signinSrPasswordExample1" placeholder="********" aria-label="********" required
                                        data-msg="Enter password."
                                        data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Accordion -->
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25 cl-black">Chi tiết vận chuyển</h3>
                        </div>
                        <!-- End Title -->
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Ghi chú đơn hàng (Nếu có)
                            </label>

                            <div class="input-group">
                                <textarea class="form-control p-5" rows="4" name="text" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                        <!-- End Input -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection