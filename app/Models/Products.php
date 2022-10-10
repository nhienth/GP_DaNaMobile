<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Preview;
class Products extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_img',
        'category_id',
        'product_view'
    ];

    protected $attributes = [
        'product_view' => 0
    ];
    public function stock()
    {
        return $this->hasOneThrough(
            Stocks::class,
            Combinations::class,
            'product_id', 
            'products_combinations_id',
            'id', 
            'id' 
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function specfications()
    {
        return $this->hasMany(ProductSpecificationsOptionsValue::class, 'product_id');
    }
    public function combinations(){
        return $this->hasMany(Combinations::class,'product_id');
    }

    public function preview(){
        return $this->hasMany(Preview::class,'product_id');
    }

    public function voucher_product()
    {
        return $this->hasOne(Voucher::class, 'product_id', 'id');
    }
}