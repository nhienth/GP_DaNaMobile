<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //$table tên bảng trong database

    protected $table ="posts";

    //$table tên trường trong bảng $table

    protected $fillable = [
        'tittle', 'summary', 'content', 'post_img', 'status', 'category_id', 'added_by' 
    ];

    public function Category(){
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class,'added_by', 'id');
    }

    public function Preview(){
        return $this->hasMany(PostReview::class,'posts_id', 'id');
    }
}
