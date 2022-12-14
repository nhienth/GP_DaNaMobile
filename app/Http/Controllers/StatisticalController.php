<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Chart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Combinations;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function index()
    {
        $category = Category::count();
        $role = User::count();
        $product = Product::count();
        $order = Order::count();

        $probyCate = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('categories.*', 'products.*', DB::raw('count(*) as totalCate'))
        ->where('category_id', '<>', '0')
        ->groupBy('category_id')
        ->pluck('totalCate', 'category_id')
        ->all();

        return view('admin.index', compact(['category', 'role', 'product', 'order']));
    }

    public function getAllStatisticals() {
        // Top sản phẩm bán nhanh 
        $topSellingProducts = $this->sellingProducts('DESC', 10);

        // Top sản phẩm bán chậm
        $slowSellingProducts = $this->sellingProducts('ASC', 10);

        // Danh sách sản phẩm chưa có lượt mua
        $listIdproductsSold = $this->listSoldProducts();
        $unSoldProduts = Combinations::whereNotIn('id', $listIdproductsSold)->get();

        // Top doanh thu 7 ngày qua
        $topRevenueInWeek = $this->topRevenue('subWeek', 100);

        // Top doanh thu 1 tháng qua
        $topRevenueInMonth = $this->topRevenue('subMonth', 100);

    }

    public function sellingProducts($orderBy, $limit) {
        return Combinations::select('products.*', 'categories.category_name', 'products_combinations.combination_string','products_combinations.id as productcombi_id' ,DB::raw('SUM(order_details.quantity) as totalSold'))
        ->join('order_details', 'order_details.product_id', '=', 'products_combinations.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'products_combinations.product_id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('orders.status', '=', 2)
        ->groupBy('products_combinations.id')
        ->having('totalSold', '>', 0)
        ->orderBy('totalSold', $orderBy)
        ->take($limit)
        ->get();
    }

    public function listSoldProducts () {
        $products = $this->sellingProducts('DESC', 100);
        $productsId = [];
        foreach ($products as $product) {
            array_push($productsId, $product->productcombi_id);
        }

        return $productsId;
    }

    public function topRevenue($sub, $limit) {
        return Combinations::select('products.*', 'categories.category_name', 'products_combinations.combination_string','products_combinations.id as productcombi_id' ,DB::raw('SUM(order_details.quantity) as totalSold'), DB::raw('SUM(order_details.total_amount) as totalRevenue'))
        ->join('order_details', 'order_details.product_id', '=', 'products_combinations.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'products_combinations.product_id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('orders.status', '=', 2)
        ->whereBetween('order_details.created_at', [Carbon::now()->$sub()->format("Y-m-d H:i:s"), Carbon::now()])
        ->groupBy('products_combinations.id')
        ->having('totalSold', '>', 0)
        ->orderBy('totalRevenue', 'DESC')
        ->take($limit)
        ->get();
    }

    


}
