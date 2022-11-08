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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Quản lý sản phẩm</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin">Trang chủ</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin/product/list">Sản
                                            phẩm</a>
                                    </li>
                                    <li class="breadcrumb-item active">Danh sách sản phẩm
                                    </li>
                                </ol>
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
                                <label class="form-label" for="UserRole">Tìm kiếm theo danh mục</label>
                                <form action="{{ route('search') }}" method="GET">
                                    @csrf
                                    <select name="key_cate_id" class="form-select text-capitalize mb-md-0 mb-2"
                                        id="cate" onchange="this.form.submit()" class="sorting">
                                        <option value="0">Danh mục</option>
                                        <option value="0">Tất cả sản phẩm</option>

                                        @foreach ($categories as $category)
                                        <option data-id="{{ $category->id }}" value="{{ $category->id }}">
                                            {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </form>
                                <!-- <select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2">
                                        <option value=""> Select Role </option>
                                        <option value="' + d + '" class="text-capitalize">' + d + '</option>
                                    </select> -->
                            </div>
                            <div class="col-md-4 user_plan">
                                <label class="form-label" for="UserPlan">Kế hoạch</label>
                                <select id="UserPlan" class="form-select text-capitalize mb-md-0 mb-2">
                                    <option value=""> Select Plan </option>
                                </select>
                            </div>
                            <div class="col-md-4 user_status">
                                <label class="form-label" for="FilterTransaction">Trạng thái</label>
                                <select id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2xx">
                                    <option value=""> Select Status </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-datatable table-responsive pt-0"> --}}
                        <div class="card-datatable pt-0">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div
                                    class="f-flex justify-content-between align-items-center header-actions mx-2 row mt-75">
                                    <div
                                        class="col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start">
                                        <div class="dataTables_length" id="DataTables_Table_0_length">
                                            <label>
                                                Hiển thị
                                                <select name="DataTables_Table_0_length" class="form-select"
                                                    aria-controls="DataTables_Table_0">
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
                                        <div
                                            class="dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap">
                                            <div class="me-1">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label>
                                                        Tìm kiếm:
                                                        <input type="search" class="form-control" placeholder
                                                            aria-controls="DataTables_Table_0">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="dt-buttons d-inline-flex mt-50">
                                                <button
                                                    class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2"
                                                    tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                                    aria-haspopup="true">Xuất</button>

                                                <a type="button" href="{{url('/admin/product/create')}}"
                                                    class="dt-button add-new btn btn-primary" tabindex="0"
                                                    data-bs-target="#modals-slide-in"
                                                    aria-controls="DataTables_Table_0">
                                                    <span>Thêm Sản phẩm mới</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="user-list-table table dataTable no-footer dtr-column text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Tên Sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Ảnh</th>
                                        <th>Lượt xem</th>
                                        <th>Trạng thái</th>
                                        <th>Thêm biến thể</th>
                                        <th colspan="2">Hành động</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <!-- phân trang -->
                                    <?php
                                    // $conn = mysqli_connect("localhost", "root", "","danamobile");
                                    //     if (! $conn) {

                                    //     die("Connection failed" . mysqli_connect_error());
                                    // }
                                    
                                    // else {
                                    
                                    //     mysqli_select_db($conn, "products");
                                    
                                    // }

                                    // $per_page_record = 5;
        
                                    // if (isset($_GET["page"])) {
        
                                    //     $page  = $_GET["page"];
                                
                                    // }
                                
                                    // else {
                                
                                    //     $page=1;
                                
                                    // }
                                
                                    // $start_from = ($page-1) * $per_page_record;
                                
                                    // $query = "SELECT * FROM products LIMIT $start_from, $per_page_record";
                                
                                    // $rs_result = mysqli_query ($conn, $query);
                                
                                ?>
                                    <!-- kết phân trang -->

                                    @foreach ($products as $product)
                                    <tr data-dt-row="" data-dt-column="">
                                        <td></td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->category->category_name}}</td>
                                        <td><img class="rounded"
                                                src="{{asset('images/admin/products/'.$product->product_img)}}"
                                                width="100px" height="100px" style="display:block; margin: 0 auto;">
                                        </td>
                                        <td>{{$product->product_view}}</td>
                                        <td>Trạng thái</td>
                                        <td>
                                            <a href="{{url('admin/product/addVariation',[$product->id])}}"><button
                                                    type="button" class="btn btn-info"><i
                                                        data-feather='plus'></i></button></a>
                                        </td>
                                        <td>
                                            <a href="{{url('admin/product/listProVar', [$product->id])}}"><button
                                                    type="button" class="btn btn-success"><i
                                                        data-feather='eye'></i></button></a>
                                        </td>
                                        <td>
                                            <a href="{{url('admin/product/delete', [$product->id])}}"><button
                                                    type="button" class="btn btn-danger"><i
                                                        data-feather='trash-2'></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Phân trang -->
                            <nav aria-label="Page navigation example" style="text-align: center">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <?php

                                        // $query = "SELECT COUNT(*) FROM products";

                                        // $rs_result = mysqli_query($conn, $query);

                                        // $row = mysqli_fetch_row($rs_result);

                                        // $total_records = $row[0];

                                        // echo "</br>";

                                        // $total_pages = ceil($total_records / $per_page_record);

                                        // number of pages required

                                        // $pagLink = "";

                                        // if($page>=2){

                                        //     echo "<a href='http://127.0.0.1:8000/admin/product/list?list&page=".($page-1)."'>  Prev </a>";

                                        // }

                                        // for ($i=1; $i<=$total_pages; $i++) {

                                        //     if ($i == $page) {

                                        //         $pagLink .= "<a class = 'active' href='http://127.0.0.1:8000/admin/product/list?list&page=".$i."'>".$i." </a>";

                                        //     }

                                        //     else  {

                                        //         $pagLink .= "<a href='http://127.0.0.1:8000/admin/product/list?list&page=".$i."'>".$i." </a>";

                                        //     }

                                        // };

                                        // echo $pagLink;

                                        // if($page<$total_pages){

                                        //     echo "<a href='http://127.0.0.1:8000/admin/product/list?list&page=".($page+1)."'>  Next </a>";

                                        // }

                                    ?>
                                        <?php
                                        $total_pages = '';
                                        $page = '';
                                    ?>
                                        <br>
                                        <br>
                                        <input id="page" type="number" min="1" max="<?php echo $total_pages
                                        ?>" placeholder="<?php echo $page." /".$total_pages; ?>" required>
                                    </li>
                                </ul>
                            </nav>
                            <!-- kết phân trang -->
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