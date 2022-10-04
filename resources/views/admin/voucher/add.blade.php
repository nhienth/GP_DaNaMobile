@extends('admin.layouts.master')
@section('main')
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Voucher</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Voucher</a>
                                    </li>
                                    <li class="breadcrumb-item active">Thêm Voucher
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="content-body">
                <!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="avatar me-75">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" width="38" height="38" alt="Avatar" />
                                        </div>
                                        <div class="author-info">
                                            <h6 class="mb-25">Chad Alexander</h6>
                                            <p class="card-text">May 24, 2020</p>
                                        </div>
                                    </div>
                                    <!-- Form -->
                                    
                                    <form action="" class="mt-2">
                                        <div class="row">
                                            <div class="form-group">
                                                <a href="{{route('admin.voucher.list')}}" class="btn btn-primary float-end">Thêm Voucher</a>
                                            </div>
                                            <div class="card-body">
                                                <form action="route{{('voucher.store')}}" method="POST">
                                                @csrf
                                                
                                            <div class="col-md-6 col-12">
                                                <div class="mb-2">
                                                    <label class="form-label" for="blog-edit-slug">ID</label>
                                                    <input type="text" id="blog-edit-slug" class="form-control" value="" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-2">
                                                    <label class="form-label" for="blog-edit-title">Mã giảm giá</label>
                                                    <input type="text" id="blog-edit-title" class="form-control" value="" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-2">
                                                    <label class="form-label" for="blog-edit-category">Loại Hình</label>  
                                                    <input type="text" id="blog-edit-slug" class="form-control" value="" />                                             
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-2">
                                                    <label class="form-label" for="blog-edit-slug">Giá trị</label>
                                                    <input type="text" id="blog-edit-slug" class="form-control" value="" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-2">
                                                    <label class="form-label" for="blog-edit-status">Mã sản phẩm</label>
                                                    <input type="text" id="blog-edit-slug" class="form-control" value="" />
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 col-12">
                                                <div class="mb-2">
                                                    <label class="form-label" for="blog-edit-status">Trạng thái</label>   
                                                    <input type="text" id="blog-edit-slug" class="form-control" value="" />                                              
                                                </div>
                                            </div>
                                            
                                            <div class="col-12 mt-50">
                                                <button type="submit" class="btn btn-primary me-1">Add</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                    </form>
                                    <!--/ Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Blog Edit -->

            </div>
        </div>
    </div>
@endsection

