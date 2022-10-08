<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combinations extends Model
{
  
    protected $table = 'products_combinations';
    
    protected $fillable = [
        'combination_string','sku','price','avilableStock','product_id'
    ];
    // public function stock()
    // {
    //     return $this->hasOneThrough(
    //         Stocks::class,
    //         Combinations::class,
    //         'product_id', 
    //         'products_combinations_id',
    //         'id', 
    //         'id' 
    //     );
    // }

    public function product(){
        return $this->belongsTo(Products::class,'product_id');
    }

    public function stock(){
        return $this->hasOne(Stocks::class,'products_combinations_id', 'id');
    }


}
