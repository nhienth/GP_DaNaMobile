<?php

namespace App\Models\Slider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    use HasFactory;
    protected $table = "slider";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $attributes = [
        'slider_img'
    ];

    public function getAll()
    {
        return $this::all();
    }
}