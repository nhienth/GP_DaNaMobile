<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderDetails extends Model
{
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
}
