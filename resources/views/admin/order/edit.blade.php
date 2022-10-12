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
                        <h2 class="content-header-title float-start mb-0">Quản lý Đơn hàng</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin">Quản trị</a>
                                </li>
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin/order/list">Đơn hàng</a>
                                </li>
                                <li class="breadcrumb-item active">Cập nhật Đơn hàng
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
                                <h3 class="card-title fw-bolder">Cập nhật Đơn hàng</h3>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate action="{{url('admin/order/update', [$order->id])}}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label fs-5 fw-bolder" for="basic-addon-name">Mã đơn hàng</label>
                                        <input type="text" id="basic-addon-name" class="form-control" value="{{$order->id}}" readonly placeholder="" aria-label="Name" name="title" aria-describedby="basic-addon-name" required />
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label fs-5 fw-bolder" for="basic-addon-name">Trạng thái</label>
                                        <select class="form-control" name="status">
                                            <option value="0">Đợi xử lý</option>
                                            <option value="1">Đang giao hàng</option>
                                            <option value="2">Đã giao hàng</option>
                                            <option value="3">Đã huỷ hàng</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                                    <button type="reset" class="btn btn-primary me-2">Nhập lại</button>
                                    <a href="{{url('/admin/product/list')}}" class="btn btn-primary">Danh sách</a>
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