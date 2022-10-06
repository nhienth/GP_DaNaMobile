<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order_detail extends Model
{
   protected $table ='order_details';
   protected $fillable =[
    'order_details_id',
    'order_details_quantity',
    'order_details_total_amount',
    'order_details_order_id',
    'order_details_product_id',
   ];
}
