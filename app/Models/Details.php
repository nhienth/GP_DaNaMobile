<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Details extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
        'id',
        'quantity',
        'total_amount',
        'order_id',
        'product_id'
    ];
}
