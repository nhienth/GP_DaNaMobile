<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Slider\SliderModel;

class SliderController extends Controller
{
    //
    private $slider;

    public function __construct()
    {
        $this->slider = new SliderModel();
    }
    public function getAll()
    {
        // $result =  $this->slider->getAll();
        return view('admin.slider.add');

        // var_dump($this->slider->getAll());
    }
}