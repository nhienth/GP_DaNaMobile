@extends('client.layouts.master')
@section('main')
<main id="content" role="main" class="cart-page">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ url('/')}}">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Đơn hàng của bạn</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center text-black">Đơn hàng của tôi</h1>
        </div>
        <div class="mb-10 cart-table text-black">
            <table class="table text-black" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-remove">#</th>
                        <th class="product-remove">Ngày đặt hàng</th>
                        <th class="product-name">Tổng tiền</th>
                        <th class="product-price">Địa điểm nhận</th>
                        <th class="product-price">TÌnh trạng đơn hàng</th>
                        <th class="product-quantity w-lg-15">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($myBill as $item )
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->create_at}}</td>
                            <td>{{number_format( $item->total_amount )}}₫</td>
                            <td>{{ $item->address }}</td>
                            <?php
                                if($item->status==0){
                                    echo "<td class='badge rounded-pill badge-light-primary me-1'>Đang xử lý</td>";
                                }else if($item->status==1){
                                    echo "<td class='badge rounded-pill badge-light-info me-1'>Đang giao hàng</td>";
                                }else if($item->status==2){
                                    echo "<td class='badge rounded-pill badge-light-success me-1'>Đã giao hàng</td>";
                                }else {
                                    echo "<td class='badge rounded-pill badge-light-warning me-1'>Đã huỷ hàng</td>";
                                }
                            ?>
                            <td><a href="{{url('bill/detail/'.$item->id)}}"><button type="button" class="btn btn-primary">Xem chi tiết</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
<script>
    let cartBtn = document.querySelectorAll('.deleteCart');
    cartBtn.forEach(element => {
        element.firstElementChild.stopPropagation();
    });
</script>
@endsection
