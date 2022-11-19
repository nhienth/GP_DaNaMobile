@extends('client.layouts.master')
@section('main')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="checkout-page">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Liên hệ</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->
    <div class="container">
        <div class="mb-5">
            <h1 class="text-center" style="color:black;">Liên hệ</h1>
        </div>
        
        <!-- Accordion -->
        <form class="js-validate" novalidate="novalidate" action="{{url('contact')}}" style="color: black;"
            method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Billing Form -->
            @if (Session::has('success'))
                <h1 style="margin-left: 20px;color: green">{{Session::get('success')}}</h1>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <!-- Input -->
                    <div class="js-form-message mb-3">
                        <label class="form-label">
                            Họ và tên
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" placeholder="" value="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                    </div>
                    <!-- End Input -->
                </div>
                
                <div class="col-md-12">
                    <!-- Input -->
                    <div class="js-form-message mb-6">
                        <label class="form-label">
                            Địa chỉ email
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" name="email" placeholder="" value=""  data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <!-- End Input -->
                </div>

                <div class="col-md-12">
                    <!-- Input -->
                    <div class="js-form-message mb-6">
                        <label class="form-label">
                            Tiêu đề
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="subject" placeholder="" value=""  data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <!-- End Input -->
                </div>

                <div class="col-md-12">
                    <!-- Input -->
                    <div class="js-form-message mb-6">
                        <label class="form-label">
                            Nội dung liên hệ
                            <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
                    </div>
                    <!-- End Input -->
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-outline-primary">Gửi</button>
                </div>

            </div>
            <!-- End Billing Form -->
        </form>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->

@endsection