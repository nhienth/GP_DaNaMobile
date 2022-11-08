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
                        <h3 class="section-title mb-0 pb-2 font-size-25">Thông tin tài khoản</h3>
                    </div>
                    <!-- End Title -->
                    <!-- Billing Form -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-6">
                                <label class="form-label">
                                    Họ và tên
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="" placeholder="" value="{{ $user->name }}" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off" disabled>
                                
                            </div>
                            <!-- End Input -->
                        </div>
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-6">
                                <label class="form-label">
                                    Vai trò
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="" value="
                                        <?php
                                            if($user["role"]==1){
                                                echo "Admin";
                                            }else {
                                                echo "Khách hàng";
                                            }
                                        ?>
                                " data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success" disabled>
                            </div>
                            <!-- End Input -->
                        </div>
                        <div class="col-md-12">
                            <!-- Input -->
                            <div class="js-form-message mb-6">
                                <label class="form-label">
                                    Địa chỉ Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="" placeholder="" value="{{ $user->email }}"  data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success" disabled>
                            </div>
                            <!-- End Input -->
                        </div>

                        <div class="w-100"></div>

                        <div class="col-md-12">
                            <!-- Input -->
                            <div class="js-form-message mb-6">
                                <label class="form-label">
                                    Địa chỉ của tôi
                                    <span class="text-danger">*</span>
                                </label>
                                <a href="{{url('/user/showaddress',[$user->id])}}"><button type="button" class="btn btn-gradient-info">Xem địa chỉ</button></a>
                            </div>
                            <!-- End Input -->
                        </div>

                        
                        
                        <div class="col-md-4 ">
                        <a href="{{url('user/update',[$user->id])}}"><button type="button" class="btn btn-outline-primary">Chỉnh sửa</button></a>
                        </div>
                    </div>
                    <!-- End Billing Form -->
                </div>
            </div>
        </div>
    </form>
</div>
@endsection