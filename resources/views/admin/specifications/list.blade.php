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
                                    <h2 class="content-header-title float-start mb-0"></h2>
                                    <div class="breadcrumb-wrapper">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin">Trang chủ</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin/slider/list">Thông số</a>
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
                                    <label class="form-label" for="UserRole">Tên</label>
                                    <form action="{{ route('spe_name') }}" method="GET">
                                        @csrf
                                        <select name="name" class="form-select text-capitalize mb-md-0 mb-2"
                                            id="name" onchange="this.form.submit()" class="sorting">
                                            <option value="0"> Tất cả </option>
                                            <option value="1" class="text-capitalize">Từ A đến Z</option>
                                            <option value="2" class="text-capitalize">Từ Z đến A</option>
                                        </select>
                                    </form>
                                </div>
                                
                                <div class="col-md-4 user_role">
                                    <label class="form-label" for="UserRole">Danh mục</label>
                                    <form action="{{ route('category') }}" method="GET">
                                        @csrf
                                        <select name="category" class="form-select text-capitalize mb-md-0 mb-2"
                                            id="category" onchange="this.form.submit()" class="sorting">
                                            <option value="0"> Tất cả </option>
                                            {!! $categorySelect !!}
                                        </select>
                                    </form>
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
                                                <form action="{{route('search_spe')}}" method="get">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label>
                                                        Tìm kiếm: 
                                                        <input type="text" class="form-control" placeholder aria-controls="DataTables_Table_0" name="key_search">
                                                    </label>
                                                    <div class="dt-buttons d-inline-flex mt-50">
                                                        <button class="dt-button buttons-collection btn btn-outline-secondary me-2" 
                                                        tabindex="0" aria-controls="DataTables_Table_0" type="submit" aria-haspopup="true">Tìm kiếm</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                            <div class="dt-buttons d-inline-flex mt-50">
                                                <a href="{{url('admin/specification/create')}}" style="color:white;"><button type="button" class="dt-button add-new btn btn-primary" tabindex="0" data-bs-target="#modals-slide-in" aria-controls="DataTables_Table_0">
                                                    Thêm Thông số mới
                                                </button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="user-list-table table dataTable no-footer dtr-column text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID Thông số</th>
                                        <th>Tên Thông số</th>
                                        <th>Danh mục</th>
                                        <th colspan="2">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($specifications_list as $specification )
                                            <tr data-dt-row="" data-dt-column="">
                                            <td>{{$specification->id}}</td>
                                            <td>{{$specification->specification_name}}</td>
                                            <td>{{$specification->category->category_name}}</td>
                                            
                                            <td><a href="{{url('admin/specification/update',[$specification->id])}}"><button type="button" class="btn btn-primary">Sửa</button></a></td>
                                            <td><a href="{{url('admin/specification/delete',[$specification->id])}}"><button type="button" class="btn btn-primary">Xóa</button></a></td>
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
                        <!-- Modal to add new user starts-->
                        <!-- Modal to add new user Ends-->
                    </div>
                    <!-- list and filter end -->
                </section>
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection