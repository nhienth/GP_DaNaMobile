<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Voucher extends Model
{
   protected $table ='vouchers';
   protected $fillable =[
    'vouchers_id',
    'vouchers_code',
    'vouchers_type',
    'vouchers_value',
    'vouchers_status'
   ];
}
