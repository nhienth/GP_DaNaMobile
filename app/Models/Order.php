<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'order_number', 'user_id', 'sub_total', 'voucher','total_amount','payment_id','status','full_name','email','phone','address','note'
    ];
    protected $primaryKey = 'id';
    protected $table = 'orders';

    public function orderdetail(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
    
}


