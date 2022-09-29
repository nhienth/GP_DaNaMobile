@extends('admin.layouts.master')
@section('main')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-list-wrapper">
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <table class="invoice-list-table table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tiêu Đề</th>                             
                                    <th>Tóm Tắt</th>
                                    <th>Mô Tả</th>
                                    <th>Ảnh</th>
                                    <th>Danh Mục</th>
                                    <th>Tác Giả</th>
                                    <th>Trạng Thái</th>                                
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection