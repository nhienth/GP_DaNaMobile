$(document).ready(function () {
    $(document).on("change", ".select-statistical-js", function (e) {
        let optionStat = $('#choise_option_statistical').val();
        let orderStat = $('#choise_order_statistical').val();
        let amountStat = $('#choise_amount_statistical').val();
        let startDay = $('#start-day').val();
        let endDay = $('#end-day').val();

        data = {startDay, endDay, optionStat, orderStat, amountStat};
        if (optionStat == 1) {
            fetchSellingStatistical(data);
        } else if (optionStat == 2) {
            fetchRevenueStatistical(data);
        } else {
            fetchUnSoldProduts(data);
        }
    });

    function fetchSellingStatistical(data) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "GET",
            url: "/admin/statistical/list",
            data: data,
            dataType: "json",
            success: function (response) {
                $("table").empty();
                $("table").append(
                    `
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Ngày bán</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Tổng bán được</th>
                            <th>Số lượng còn lại</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    `
                )
                $.each(response.productStatistical, function (index, product) { 
                    let date = moment(product.created_at, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY');
                    $("tbody").append(
                        `
                        <tr data-dt-row="" data-dt-column="">
                            <td></td>
                            <td>${date}</td>
                            <td>${product.product_name} ${product.combination_string}</td>
                            <td>${product.category_name}</td>
                            <td><img class="rounded" src="../../images/products/${product.combination_image}"
                                    width="150px" height="100px" style="display:block; margin: 0 auto;"></td>
                            <td>${Intl.NumberFormat('en-US').format(product.price)} đ</td>
                            <td>${product.totalSold}</td>
                            <td>${product.avilableStock}</td>
                    
                        </tr>
                        
                        `
                    )
                });
                paginationStat('tbody tr');

            }, error: function (response) {
                console.log(response);
            }
        });
    }

    function fetchRevenueStatistical(data) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "GET",
            url: "/admin/statistical/list",
            data: data,
            dataType: "json",
            success: function (response) {
                $("table").empty();
                $("table").append(
                    `
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Ngày bán</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Số lượng bán được</th>
                            <th>Tổng doanh thu</th>
                            <th>Số lượng còn lại</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    `
                )
                $.each(response.productStatistical, function (index, product) { 
                    let date = moment(product.created_at, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY');
                    $("tbody").append(
                        `
                        <tr data-dt-row="" data-dt-column="">
                            <td></td>
                            <td>${date}</td>
                            <td>${product.product_name} ${product.combination_string}</td>
                            <td>${product.category_name}</td>
                            <td><img class="rounded" src="../../images/products/${product.combination_image}"
                                    width="150px" height="100px" style="display:block; margin: 0 auto;"></td>
                            <td>${Intl.NumberFormat('en-US').format(product.price)} đ</td>
                            <td>${product.totalSold}</td>
                            <td>${Intl.NumberFormat('en-US').format(product.totalRevenue)} đ</td>
                            <td>${product.avilableStock}</td>
                        </tr>
                        `
                    )
                });
                paginationStat('tbody tr');

            }, error: function (response) {
                console.log(response);
            }
        });
    }

    function fetchUnSoldProduts(data) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "GET",
            url: "/admin/statistical/list",
            data: data,
            dataType: "json",
            success: function (response) {
                $("table").empty();
                $("table").append(
                    `
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Ngày nhập hàng</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Số lượng còn lại</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    `
                )
                $.each(response.productStatistical, function (index, product) { 
                    let date = moment(product.created_at, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY');
                    $("tbody").append(
                        `
                        <tr data-dt-row="" data-dt-column="">
                            <td></td>
                            <td>${date}</td>
                            <td>${product.product_name} ${product.combination_string}</td>
                            <td>${product.category_name}</td>
                            <td><img class="rounded" src="../../images/products/${product.combination_image}"
                                    width="150px" height="100px" style="display:block; margin: 0 auto;"></td>
                            <td>${Intl.NumberFormat('en-US').format(product.price)} đ</td>
                            <td>${product.avilableStock}</td>
                        </tr>
                        `
                    )
                });
                paginationStat('tbody tr');

            }, error: function (response) {
                console.log(response);
            }
        });
    }

    function choiceDetailTime(optionTimeValue) {
    $('#choise_detailTime_statistical')
        .empty()
        .append('<option value="0">Toàn bộ thời gian</option>')
    switch(optionTimeValue) {
        case "1":
            $('#choise_detailTime_statistical').empty();
            let selectDayValues = ['1 ngày', '2 ngày', '3 ngày', '4 ngày', '5 ngày', '6 ngày'];
            $.each(selectDayValues, function (index, value) {
                $('#choise_detailTime_statistical').append($('<option>', { 
                    value: index + 1,
                    text : value
                }));
            });
            break;
        case "2":
            $('#choise_detailTime_statistical').empty();
            let selectWeekValues = ['1 tuần', '2 tuần', '3 tuần', '4 tuần'];
            $.each(selectWeekValues, function (index, value) {
                $('#choise_detailTime_statistical').append($('<option>', { 
                    value: index + 1,
                    text : value
                }));
            });
            break;
        case "3":
            $('#choise_detailTime_statistical').empty();
            let selectMonthValues = ['1 tháng', '2 tháng', '3 tháng', '4 tháng', '5 tháng', '6 tháng', '7 tháng', '8 tháng', '9 tháng', '10 tháng', '11 tháng'];
            $.each(selectMonthValues, function (index, value) {
                $('#choise_detailTime_statistical').append($('<option>', { 
                    value: index + 1,
                    text : value
                }));
            });
            break;
        case "4":
            $('#choise_detailTime_statistical').empty();
            let selectYearValues = ['1 năm', '2 năm', '3 năm', '4 năm'];
            $.each(selectYearValues, function (index, value) {
                $('#choise_detailTime_statistical').append($('<option>', { 
                    value: index + 1,
                    text : value
                }));
            });
            break;
        default:
        
        }
    }
    
    function paginationStat(element) {
    
        let items = $(element);
        let numItems = items.length;
        let perPage = 5;

        items.slice(perPage).hide();

        $('#pagination-container').pagination({
            items: numItems,
            itemsOnPage: perPage,
            prevText: "&laquo;",
            nextText: "&raquo;",
            onPageClick: function (pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide().slice(showFrom, showTo).show();
            }
        });
    }

});

