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
                    <div class="content-header row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                    <h2 class="content-header-title float-start mb-0">Tài khoản</h2>
                                    <div class="breadcrumb-wrapper">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin">Trang chủ</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin/user/list">Tài khoản</a>
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
                            <h4 class="card-title">Tìm kiếm và Lọc</h4>
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
                                        <th>Mã khách hàng</th>
                                        <th>Tên</th>
                                        <th>Mail</th>
                                        <th>Mật khẩu</th>
                                        <th>Chức năng</th>
                                        <th>Trạng thái</th>  
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alluser as $key)
                                    <tr data-dt-row="" data-dt-column="">
                                        <td></td>
                                        <td>{{$key->id}}</td>
                                        <td>{{$key->name}}</td>
                                        <td>{{$key->email}}</td>
                                        <td><input type="password" name="" id="" value="{{$key->password}}" disabled></td>
                                        <td>
                                            <?php
                                            if($key["role"]==1){
                                                echo "Admin";
                                            }else {
                                                echo "Khách hàng";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($key["name_address"]==1){
                                                echo "Văn phòng";
                                            }else {
                                                echo "Nhà riêng";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($key["status"]==0){
                                                echo "Hoạt động";
                                            }else {
                                                echo "Vô hiệu hóa";
                                            }
                                            ?>
                                        </td>
                                        <td><a href="{{url('admin/user/edit',[$key->id])}}"><button type="button" class="btn btn-gradient-success"><i data-feather='edit'></i></button></a></td>
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