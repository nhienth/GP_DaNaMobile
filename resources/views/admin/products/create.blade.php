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
                        <h2 class="content-header-title float-start mb-0">Quản lý sản phẩm</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Quản trị</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Sản phẩm</a>
                                </li>
                                <li class="breadcrumb-item active">Nhập sản phẩm mới
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
                                <h3 class="card-title fw-bolder">Thêm sản phẩm</h3>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate action="{{url('/admin/product/create')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label fs-5 fw-bolder" for="basic-addon-name">Tên sản phẩm</label>

                                        <input type="text" id="basic-addon-name" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="Name" name="product_name" aria-describedby="basic-addon-name" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your name.</div>
                                    </div>
                                    
                                    <div class="mb-1">
                                        <label class="form-label fs-5 fw-bolder" for="select-country1">Danh mục sản phẩm</label>
                                        <select class="form-select" id="select-country1" name="category_id" required name="parent_id">
                                            <option value="0">Danh mục sản phẩm</option>
                                            {!! $categorySelect !!}
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select your country</div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="customFile1" class="form-label fs-5 fw-bolder">Ảnh sản phẩm</label>
                                        <input class="form-control" name="product_img" type="file" id="customFile1" required />
                                    </div>
                               

                                    <div class="mb-1">
                                        <label class="d-block form-label fs-5 fw-bolder" for="">Thông số sản phẩm</label>
                                    </div>

                                    @foreach ($specfications as $specfication)
                                        <div class="mb-1 ms-2">
                                            <label class="form-label fs-6 fw-bolder" for="basic-addon-name">
                                                {{$specfication->specification_name}}
                                            </label>
                                            <input type="text" id="basic-addon-name" class="form-control" placeholder="Nhập thông số sản phẩm" name="{{$specfication->id}}_value" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        </div>
                                    @endforeach


                                    <div class="mb-1">
                                        <label class="d-block form-label fs-5 fw-bolder" for="validationBioBootstrap">Mô tả</label>
                                        <textarea class="form-control" id="validationBioBootstrap" name="validationBioBootstrap" rows="3" required></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary me-2">Thêm</button>
                                    <button type="reset" class="btn btn-primary me-2">Nhập lại</button>
                                    <button type="button" class="btn btn-primary">Danh sách</button>
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