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
                    <table class="user-list-table table dataTable no-footer dtr-column text-center" >
                        <h3>Thông tin người mua</h3>
                        <thead class="table-light ">
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Email </th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Ngày đặt hàng</th>                                  
                            </tr>
                        </thead>
                        <tbody>                   
                            @foreach ($detail as $item)
                            <tr data-dt-row="" data-dt-column="">
                                    <td>{{$item->orders->fullname}}</td>  
                                    <td>{{$item->orders->email}}</td> 
                                    <td>{{$item->orders->phone}}</td>                                           
                                    <td>{{$item->orders->address}}</td> 
                                    <td>{{$item->orders->created_at }}</td> 
                            </tr>
                        @endforeach                                                           
                            </tr>                                                                              
                        </tbody>
                    </table>
                    <br>
                    <table class="user-list-table table dataTable no-footer dtr-column text-center" >
                        <h3>Thông tin vận chuyển</h3>
                        <thead class="table-light ">
                            <tr>
                                <th>Tên người nhận</th>
                                <th>Địa chỉ nhận</th>
                                <th>Số điện thoại</th>
                                <th>Phương thức giao hàng</th>
                                <th>Ghi chú</th>                                  
                            </tr>
                        </thead>
                        <tbody>                    
                            @foreach ($detail as $item)
                            <tr data-dt-row="" data-dt-column="">
                                    <td>{{$item->orders->fullname}}</td>  
                                    <td>{{$item->orders->address}}</td> 
                                    <td>{{$item->orders->phone}}</td>                                           
                                    <td></td> 
                                    <td>{{$item->orders->note}}</td> 
                            </tr>
                        @endforeach                                                                                
                            </tr>                                                                         
                        </tbody>
                    </table>
                    <br>
                    <table class="user-list-table table dataTable no-footer dtr-column text-center" >
                        <h3>Chi tiết đơn hàng</h3>
                        <thead class="table-light ">
                            <tr>
                                <th>ID</th>
                                <th>Mã đơn hàng</th>
                                <th>Tên sản phẩm</th>  
                                <th>Số lượng </th>
                                <th>Tổng tiền</th>                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($detail as $item)
                            <tr data-dt-row="" data-dt-column="">
                                    <td>{{$item->id}}</td>                                             
                                    <td>{{$item->order_id}}</td> 
                                    <td>{{$item->products->product_name}}</td> 
                                    <td>{{$item->quantity}}</td> 
                                    <td>{{$item->total_amount}}</td>
                            </tr>
                        @endforeach                                       
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection