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
                                <h2 class="content-header-title float-start mb-0">Phương thức thanh toán</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('admin')}}">Trang chủ</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{url('admin/payment/list')}}">Phương thức thanh toán</a>
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
                                        <a type="button" href="{{url('/admin/payment/create')}}" class="dt-button add-new btn btn-primary" tabindex="0" data-bs-target="#modals-slide-in" aria-controls="DataTables_Table_0">
                                            <span>Thêm phương thức thanh toán</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="user-list-table table dataTable no-footer dtr-column text-center" >
                            <thead class="table-light ">
                                <tr>
                                    <th>Tên</th>
                                    <th>Nội dung</th>
                                    <th>Trạng thái</th>
                                    <th colspan="2">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payment as $payments)
                                <tr data-dt-row="" data-dt-column="">
                                    <td>{{$payments->payment_name}}</td>
                                    <td>{{$payments->payment_content}}</td>
                                    <td>{{$payments->payment_status	}}</td>
                                    <td>
                                        <a href="{{url('admin/payment/edit', [$payments->id])}}"><button type="button" class="btn btn-success"><i data-feather='edit'></i></button></a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/payment/delete', [$payments->id])}}"><button type="button" class="btn btn-danger"><i data-feather='trash-2'></i></button></a>
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
@endsection