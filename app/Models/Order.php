<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'order_number', 'user_id', 'sub_total', 'voucher','total_amount','payment_id','status','full_name','email','phone','address','note'
    ];
    protected $primaryKey = 'id';
    protected $table = 'orders';

    public function orderdetail()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
    public function user(){
        return $this->hasMany(User::class,'user_id','id');
    }
    public function product(){
        return $this->hasMany(Product::class,'product_id','id');
    }
}


