@extends('client.layouts.master')
@section('main')
<div class="container">
    <div class="mb-5">
        <h1 class="text-center" style="color:black;">Thông tin tài khoản</h1>
    </div>
    <!-- Accordion -->
    <form class="js-validate" novalidate="novalidate" style="color: black;">
        <div class="row">
            <div class="col-lg-7 order-lg-1">
                <div class="pb-7 mb-7">
                    <!-- Title -->
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title mb-0 pb-2 font-size-25">Thêm địa chỉ giao hàng</h3>
                    </div>
                    <!-- End Title -->

                    <!-- Billing Form -->
                    <form action=""></form>
                    <form  action="{{url('/createaddress')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Địa chỉ
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="completeAddress" placeholder="" value="" data-msg="Vui lòng nhập địa chỉ." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">

                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Số điện thoại
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="phoneNumber" placeholder="" value="" data-msg="Vui lòng nhập số điện thoại." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Tên 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="" placeholder="" value="{{ $user->user_id }}" data-msg="Vui lòng nhập số điện thoại." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-4 ">
                                <button type="submit" class="btn btn-outline-primary">Thêm</button>
                            </div>
                        </div>
                    </form>

                    <!-- End Billing Form -->
                </div>
            </div>
        </div>
    </form>
</div>
@endsection