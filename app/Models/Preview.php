<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Preview extends Model
{

    use SoftDeletes;
    protected $table = 'product_reviews';

    protected $fillable = [
        'rate', 'review', 'status', 'user_id','product_id'
    ];

}
