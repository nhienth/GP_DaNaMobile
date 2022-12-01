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
                            <h2 class="content-header-title float-start mb-0">Thêm Voucher</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin')}}">Trang chủ</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/voucher/list')}}">Voucher</a>
                                    </li>
                                    <li class="breadcrumb-item active">Thêm mới
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
                                    <h3 class="card-title fw-bolder">Thêm Voucher</h3>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate method="POST" action="{{route('voucher.create')}}">
                                        @csrf                                                                                                         
                                        {{-- <div class="mb-1">
                                            <label class="form-label fs-5 fw-bolder" for="basic-addon-name">ID</label>
    
                                            <input value="" type="text" name="voucher_id" id="basic-addon-name" class="form-control" placeholder="Nhập ID" aria-label="Name" aria-describedby="basic-addon-name" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter ID.</div>
                                        </div> --}}
                                        <div class="mb-1">
                                            <label class="form-label fs-5 fw-bolder" for="basic-addon-name">Mã Giảm Giá</label>
    
                                            <input value="" type="text" name="voucher_code" id="basic-addon-name" class="form-control" placeholder="Nhập mã giảm giá" aria-label="Name" aria-describedby="basic-addon-name" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter Code.</div>
                                        </div>
                                        <div class="mb-1">
                                            <label
                                            class="form-label"
                                            for="select-country1"
                                            >Loại Hình</label
                                        >
                                        <select
                                            class="form-select"
                                            id="select-country1" name="voucher_type"
                                            required
                                        >
                                            <option value="Giảm theo tiền">
                                                Giảm Theo Tiền
                                            </option>
                                            <option value="Giảm theo %">
                                                Giảm Theo %
                                            </option>
                                           
                                        </select>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label fs-5 fw-bolder" for="basic-addon-name">Giá Trị</label>
    
                                            <input value="" type="text" name="voucher_value" id="basic-addon-name" class="form-control" placeholder="Nhập giá trị" aria-label="Name" aria-describedby="basic-addon-name" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter value</div>
                                        </div>
                                        
                                        <div class="mb-1">
                                            <label class="form-label fs-5 fw-bolder" for="basic-addon-name">Trạng Thái</label>
    
                                            <input value="" type="text" name="voucher_status" id="basic-addon-name" class="form-control" placeholder="Nhập trạng thái" aria-label="Name" aria-describedby="basic-addon-name" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter status.</div>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label fs-5 fw-bolder" for="basic-addon-name">Mã Sản Phẩm </label>
                            
                                            <select name="voucher_product_id"  class="form-select"
                                            id="select-country1" > Chọn mã sản phẩm
                                                @foreach ($result as  $rs)
                                                <option  value="{{$rs->id}}"> {{$rs->product_name}}</option>
                                                @endforeach
                                            </select>
                                            
                                          
                                     
                                            {{-- <input value="" type="text" name="voucher_product_id" id="basic-addon-name" class="form-control" placeholder="Nhập mã sản phẩm" aria-label="Name" aria-describedby="basic-addon-name" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter product Id.</div> --}}
                                        </div>
                                        <a href="{{route('voucher.create')}}"><button type="submit" class="btn btn-primary me-2">Thêm mới</button>
                                        <button type="submit" class="btn btn-primary me-2">Nhập lại</button>
                                        <a href="{{route('voucher.list')}}"><button type="button" class="btn btn-primary">Danh sách</button></a>
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