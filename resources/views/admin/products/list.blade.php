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
                                    <li class="breadcrumb-item"><a href="{{url('admin')}}">Trang chủ</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/admin/product/list')}}">Sản
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
                                <form action="{{route('search_product_by_cate')}}" method="GET">
                                    @csrf
                                    <select name="key_cate_id" class="form-select text-capitalize mb-md-0 mb-2"
                                        id="cate" onchange="this.form.submit()" class="sorting">
                                        <option value="0">Tất cả danh mục</option>
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
                                <label class="form-label" for="UserPlan">Lượt xem</label>
                                <form action="{{route('filter_view_product')}}" method="get">
                                    @csrf
                                    <select id="view" name="view_selected"
                                        class="form-select text-capitalize mb-md-0 mb-2" onchange="this.form.submit()">
                                        <option value="0"> Mặc định </option>
                                        <option value="1"> Giảm dần </option>
                                        <option value="2"> Tăng dần </option>
                                    </select>
                                </form>
                            </div>
                            <div class="col-md-4 user_status">
                                <label class="form-label" for="FilterTransaction">Trạng thái</label>
                                <form action="{{route('filter_status_product')}}" method="get">
                                    <select name="status_selected" id="status"
                                        class="form-select text-capitalize mb-md-0 mb-2xx"
                                        onchange="this.form.submit()">
                                        <option value="2"> Tất Cả Trạng Thái </option>
                                        <option value="1"> Đang hoạt động </option>
                                        <option value="0"> Vô Hiệu hoá </option>
                                    </select>
                                </form>
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
                                    <th colspan="3">Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 0 ?>
                                @foreach ($products as $product)
                                
                                <tr data-dt-row="" data-dt-column="">
                                    <td>{{++$i}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->category->category_name}}</td>
                                    <td><img class="rounded" src="{{asset('images/products/'.$product->product_img)}}"
                                            width="150px" height="100px" style="display:block; margin: 0 auto;"></td>
                                    <td>{{$product->product_view}}</td>
                                    <td>
                                        <?php if($product->product_status == 1){ ?>
                                        <span class="badge rounded-pill badge-light-success me-1">Đang hoạt động</span>
                                        <?php } else { ?>
                                        <span class="badge rounded-pill badge-light-warning me-1"> Vô hiệu hoá</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/product/addVariation',[$product->id])}}"><button
                                                type="button" class="btn btn-info"><i
                                                    data-feather='plus'></i></button></a>
                                    </td>
                                    <td>
                                        @if (Auth::user()->role == 2)
                                        <a href="{{url('admin/product/edit', [$product->id])}}"><button type="button"
                                            class="btn btn-warning"><i data-feather='edit'></i></button></a>
                                        @endif
                                       
                                    </td>
                                    <td>
                                       
                                        <a href="{{url('admin/product/listProVar', [$product->id])}}"><button
                                                type="button" class="btn btn-success"><i
                                                    data-feather='eye'></i></button></a>
                                    </td>
                                    <td>
                                        @if (Auth::user()->role == 2)
                                            <a href="{{url('admin/product/delete', [$product->id])}}"><button type="button"
                                                class="btn btn-danger"><i data-feather='trash-2'></i></button></a>
                                        @endif
                                      
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection