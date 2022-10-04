<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecificationsOptionsValue extends Model
{
    use HasFactory;
    protected $table = 'product_spec_options_value';

    protected $fillable = [
        'specification_value',
        'product_id',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


}
