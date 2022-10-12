@extends('admin.layouts.master')
@section('main')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Phương thức thanh toán</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin/payment/list">Phương thức thanh toán</a>
                                </li>
                                <li class="breadcrumb-item active">Nhập phương thức thanh toán
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Validation -->
            <section class="bs-validation">
                <div class="row">
                    <!-- Bootstrap Validation -->
                    <div class="col-md-8 col-12" style="margin : 0 auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bolder">Chỉnh sửa phương thức thanh toán</h3>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate action="{{url('/admin/payment/update', [$payment->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label fs-5 fw-bolder" for="basic-addon-name">Tên phương thức thanh toán</label>

                                        <input type="text" id="basic-addon-name" class="form-control" placeholder="Nhập phương thức thanh toán" value="{{$payment->payment_name}}" aria-label="Name" name="payment_name" aria-describedby="basic-addon-name" required />
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label fs-5 fw-bolder" for="basic-addon-name">Ghi chú</label>

                                        <input type="text" id="basic-addon-name" class="form-control" placeholder="Nhập ghi chú" value="{{$payment->payment_status}}" aria-label="Name" name="payment_status" aria-describedby="basic-addon-name" required />
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                                    <button type="reset" class="btn btn-primary me-2">Nhập lại</button>
                                    <a href="{{url('/admin/payment/list')}}" class="btn btn-primary">Danh sách</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Bootstrap Validation -->

                    <!-- jQuery Validation -->
                    
                    <!-- /jQuery Validation -->
                </div>
            </section>
            <!-- /Validation -->

        </div>
    </div>
</div>
    <!-- END: Content-->
@endsection