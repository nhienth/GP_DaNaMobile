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
                                    <th>Id</th>                                 
                                    <th>Tên danh mục</th>
                                    
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