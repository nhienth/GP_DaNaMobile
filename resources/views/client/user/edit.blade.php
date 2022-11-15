@extends('client.layouts.master')
@section('main')
<div class="container">
    <div class="mb-5">
        <h1 class="text-center" style="color:black;">Thông tin tài khoản</h1>
    </div>
    <!-- Accordion -->
    <form class="js-validate" novalidate="novalidate" style="color: black;" action="{{url('/user/update', [$user->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <!-- Input -->
                <div class="js-form-message mb-6">
                    <label class="form-label">
                        Họ và tên
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="name" placeholder="" value="{{ $user->name }}" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">

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
                    <input type="email" class="form-control" name="email" placeholder="" value="{{ $user->email }}" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
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
                        if ($user["role"] == 1) {
                            echo "Admin";
                        } else {
                            echo "Khách hàng";
                        }
                        ?>
                " data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success" disabled>
                </div>
                <!-- End Input -->
            </div>

            <div class="col-md-8 ">
                <button type="submit" class="btn btn-outline-primary">Cập nhật</button>
            </div>
        </div>
        <!-- End Billing Form -->
    </form>
</div>
@endsection