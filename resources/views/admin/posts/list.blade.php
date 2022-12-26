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
                            
                                <h2 class="content-header-title float-start mb-0">Bài viết</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('admin')}}">Trang chủ</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{url('admin/post/list')}}">Bài viết</a>
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
                    
                    </div>
                @if (Session::has('messenger'))
                <div class="text-secondary font-weight-bold text-xs">
                    <h2 class="btn btn-info w-30">{{Session::get('messenger')}}</h2>
                </div>
                @endif
                    <div class="card-datatable table-responsive pt-0">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="f-flex justify-content-between align-items-center header-actions mx-2 row mt-75">
                                <div class="col-sm-12 col-lg-6 d-flex justify-content-center justify-content-lg-start">
                                    <form action="" method="get">
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
                                <div class="col-sm-12 col-lg-6 ps-xl-75 ps-0">
                                    <div class="dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap">
                                        <div class="dt-buttons d-inline-flex mt-50">
                                            <a href="{{url('admin/post/create')}}" style="color:white;"><button type="button" class="dt-button add-new btn btn-primary" tabindex="0" data-bs-target="#modals-slide-in" aria-controls="DataTables_Table_0">
                                                Thêm Bài viết mới
                                            </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="w-100 user-list-table table dataTable no-footer dtr-column text-center" style="overflow: hidden;display: block;">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tiêu đề</th>
                                    <th>Tóm tắt</th>
                                    <th>Danh mục</th>
                                    <th>Ảnh</th>
                                    <th>Tác giả</th>
                                    <th>Trang thái</th>
                                    <th>Chi tiết</th>
                                    <th colspan="2">Hành động</th>
                                </tr> 
                            <tbody>
                                <?php $i = 0 ?>
                               
                            @foreach ($PostsList as $Post)
                            <tr>
                                <th>#</th>
                                <th>{{$Post->title}}</th>
                                <th>{{$Post->summary}}</th>                               
                                <th>{{$Post->Category->category_name}}</th>
                                <th><img src="{{asset('/images/post/'.$Post->post_img)}}" width="100x" height="100px" style="object-fit:cover; display:block; margin: 0 auto;" alt=""></th>
                                <th>{{$Post->User->name}}</th>
                                <th><?php 
                                    if($Post->status == 0){
                                        echo "Công khai";
                                    }else{
                                        echo "Ẩn";
                                    }
                                ?></th>
                                <th><a href="{{url("admin/post/detail", [$Post->id])}}">Xem chi tiết</a></th>                               
                                <th><a href="{{url("admin/post/update", [$Post->id])}}">sua</a></th>
                                <th><a href="{{url("admin/post/delete", [$Post->id])}}">xoa</a></th>
                            </tr>
                            @endforeach
                               
                            </tbody>
                        </table>
                        <div id="pagination-container"></div>
                        <div>
                   
                        </div>
                        <div class="d-flex justify-content-between mx-2 row mb-1">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Hiển thị 0 đến 0 của 0 mục</div>
                            </div>
                            <div class="col-sm-12 col-md-6">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script src="{{asset('admin_js/pagination_js.js')}}"></script>