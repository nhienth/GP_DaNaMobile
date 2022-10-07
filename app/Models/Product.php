<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function specfications()
    {
        return $this->hasMany(ProductSpecificationsOptionsValue::class, 'product_id');
    }
}