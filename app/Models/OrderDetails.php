<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;
use App\Models\Order;


class OrderDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'order_details';
    protected $fillable = [
        'id',
        'quantity',
        'total_amount',
        'order_id',
        'product_id'
    ];

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

}