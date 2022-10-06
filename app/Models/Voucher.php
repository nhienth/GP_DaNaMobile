<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
   use HasFactory;
   protected $table = "vouchers";
   protected $fillable = [
       'id',
       'code',
       'type',
       'value',    
       'status',
       'product_id',
       'deleted_at'
   ];
   use SoftDeletes;
}