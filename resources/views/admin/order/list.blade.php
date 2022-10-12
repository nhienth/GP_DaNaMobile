@extends('admin.layouts.master')
@section('main')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                <section class="app-user-list">
                    <div class="content-header row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                    <h2 class="content-header-title float-start mb-0">Đơn hàng</h2>
                                    <div class="breadcrumb-wrapper">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin">Trang chủ</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin/order/list">Đơn hàng</a>
                                            </li>
                                            <li class="breadcrumb-item active">Danh sách
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Đơn hàng</h4>
                            <div class="row">
                                <div class="col-md-4 user_role">
                                    <label class="form-label" for="UserRole">Vai trò</label>
                                    <select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2">
                                        <option value=""> Select Role </option>
                                        <option value="' + d + '" class="text-capitalize">' + d + '</option>
                                    </select>
                                </div>
                                <div class="col-md-4 user_plan">
                                    <label class="form-label" for="UserPlan">Kế hoạch</label>
                                    <select id="UserPlan" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Plan </option></select>
                                </div>
                                <div class="col-md-4 user_status">
                                    <label class="form-label" for="FilterTransaction">Trạng thái</label>
                                    <select id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2xx"><option value=""> Select Status </option></select>
                                </div>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive pt-0">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="f-flex justify-content-between align-items-center header-actions mx-2 row mt-75">
                                    <div class="col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start">
                                        <div class="dataTables_length" id="DataTables_Table_0_length">
                                            <label>
                                                Hiển thị 
                                                <select name="DataTables_Table_0_length" class="form-select" aria-controls="DataTables_Table_0">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                                mục
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-8 ps-xl-75 ps-0">
                                        <div class="dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap">
                                            <div class="me-1">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label>
                                                        Tìm kiếm: 
                                                        <input type="search" class="form-control" placeholder aria-controls="DataTables_Table_0">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="dt-buttons d-inline-flex mt-50">
                                                <button class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2" 
                                                tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true">Xuất</button>
                                                {{-- <div class="dt-button-collection" style="top: 148.625px; left: 889.488px;">
                                                    <div role="menu">
                                                        <button class="dt-button buttons-print dropdown-item" tabindex="0" type="button">Print</button>
                                                        <button class="dt-button buttons-print dropdown-item" tabindex="0" type="button">Print</button>
                                                        <button class="dt-button buttons-print dropdown-item" tabindex="0" type="button">Print</button>
                                                    </div>
                                                </div> --}}
                                                <!-- <button type="button" class="dt-button add-new btn btn-primary" tabindex="0" data-bs-target="#modals-slide-in" aria-controls="DataTables_Table_0">
                                                    <span>Thêm Sản phẩm mới</span>
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="user-list-table table dataTable no-footer dtr-column text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Số lượng đơn hàng</th>
                                        <th>Mã khách hàng</th>
                                        <th>Tạm tính</th>
                                        <th>Voucher</th>
                                        <th>Tổng tiền</th>
                                        <th>Mã phương thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Tên khách hàng</th>
                                        <th>Mail</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ghi chú</th>    
                                        <th colspan="2">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr data-dt-row="" data-dt-column="">
                                        <td></td>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->order_number}}</td>
                                        <td>{{$order->user_id}}</td>
                                        <td>{{$order->sub_total}}</td>
                                        <td>{{$order->voucher}}</td>
                                        <td>{{$order->total_amount}}</td>
                                        <td>{{$order->payment_id}}</td>
                                        <td>
                                            <?php
                                            if($order["status"]==0){
                                                echo "Đang xử lý";
                                            }else if($order["status"]==1){
                                                echo "Đang giao hàng";
                                            }else if($order["status"]==2){
                                                echo "Đã giao hàng";
                                            }else {
                                                echo "Đã hủy hàng";
                                            }
                                            ?>
                                        </td>
<<<<<<< HEAD
                                        <td>{{$order->full_name}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->note}}</td>
                                        <td><a href="{{ url('admin/order/details',[$order->id])}}">Xem chi tiết</a></td> 
                                        <td><a href="{{ url('admin/order/edit',[$order->id])}}"><button type="button" class="btn btn-gradient-success"><i data-feather='edit'></i></button></a></td>
=======
                                        <td>{{$key->full_name}}</td>
                                        <td><a href="{{url('admin/order/details',[$key->id])}}"><button type="button" class="btn btn-gradient-info"><i data-feather='eye'></i></button></a></td> 
                                        <td><a href="{{url('admin/order/edit',[$key->id])}}"><button type="button" class="btn btn-gradient-success"><i data-feather='edit'></i></button></a></td>
>>>>>>> f372680433b1c0cd1744857063152199fd986cfa
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between mx-2 row mb-1">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Hiển thị 0 đến 0 của 0 mục</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                                <a href=""></a>
                                            </li>
                                            <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
                                                <a href=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- list and filter end -->
                </section>
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection