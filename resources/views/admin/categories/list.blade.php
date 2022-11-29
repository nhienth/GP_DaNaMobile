@extends('admin.layouts.master')
@section('main')
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
                                <h2 class="content-header-title float-start mb-0">Danh mục</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin/">Trang chủ</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin/category/list">Danh mục</a>
                                        </li>
                                        <li class="breadcrumb-item active">Danh sách
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
                                <label class="form-label" for="UserRole">Loại</label>
                                <form action="{{ route('level_cate') }}" method="GET">
                                    @csrf
                                    <select name="level" class="form-select text-capitalize mb-md-0 mb-2"
                                        id="level" onchange="this.form.submit()" class="sorting">
                                        <option value="0"> Tất cả </option>
                                        <option value="1" class="text-capitalize">Danh mục cha</option>
                                        <option value="2" class="text-capitalize">Danh mục con</option>
                                    </select>
                                </form>
                            </div>
                            <div class="col-md-4 user_plan">
                                <label class="form-label" for="UserPlan">Tên</label>
                                <form action="{{ route('filter_name_cate') }}" method="GET">
                                    @csrf
                                    <select name="filter_name" class="form-select text-capitalize mb-md-0 mb-2"
                                        id="filter_name" onchange="this.form.submit()" class="sorting">
                                        <option value="0"> Mặc định </option>
                                        <option value="2" class="text-capitalize"> A đến Z</option>
                                        <option value="1" class="text-capitalize">Z đến A</option>
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
                                            <form action="{{route('search_cate')}}" method="get">
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
                                            <a href="{{url('admin/category/create')}}" style="color:white;"><button type="button" class="dt-button add-new btn btn-primary" tabindex="0" data-bs-target="#modals-slide-in" aria-controls="DataTables_Table_0">
                                                Thêm Danh mục mới
                                            </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="user-list-table table dataTable no-footer dtr-column text-center" >
                            <thead class="table-light ">
                                <tr>
                                    <th>#</th>
                                    <th>Mã Danh mục</th>
                                    <th>Tên Danh mục</th>
                                    <th>Hình ảnh</th>
                                    <th>Danh mục cha</th>
                                    <th colspan="2">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0 ?>
                                @foreach ($categories as $category)
                                <tr data-dt-row="" data-dt-column="">                                 
                                       <td>{{++$i}}</td>
                                       <td>{{$category->id}}</td>
                                       <td>{{$category->category_name}}</td>
                                       <td><img class="rounded"
                                        src="{{asset('images/categories/'.$category->category_image)}}"
                                        width="100px" height="100px" style="display:block; margin: 0 auto;"></td>
                                       <?php if($category->parent_cate ==0 ){ ?>
                                            <td>Danh mục cha</td>
                                       <?php }else{ ?>
                                        <td>{{$category->parent_cate}}</td>
                                      <?php } ?>
                                       <td><a href="{{url('admin/category/update', [$category->id])}}"><button type="button" class="btn btn-gradient-success"><i data-feather='edit'></i></button></a></td>
                                       <td><a href="{{url('admin/category/delete', [$category->id])}}"><button type="button" class="btn btn-gradient-danger"><i data-feather='trash-2'></i></button></a></td>                              
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
@endsection