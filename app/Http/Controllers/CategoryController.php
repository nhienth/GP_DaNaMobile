<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $html = '';
    public function index()
    {
        // $categorySelect = $this -> res(0);
        // return view('admin.category.list',compact('categorySelect'));
        $categories = Category::all();
        return view('admin.category.list', ['categoryList' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorySelect = $this -> res(0);
        return view('admin.category.create',compact('categorySelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = new Category();
        $categories = Category::all();
        $cate -> category_name = $request['category_name'];
        $cate -> category_image = $request['category_image'];
        $cate -> parent_id = $request['parent_id'];
        $cate ->save();
        $categorySelect = $this -> res(0);
        return $this->index();
        // return redirect('/admin/category');
        // return redirect('admin/categoies/list');
        // return \Redirect::route('admin.categories.list')->with('status','Bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function res($id, $text = ''){
        $data = Category::all();  
            foreach($data as $value){
                if($value['parent_id'] == $id)
                {
                    $this->html .='<option value="'.$value['id'].'">' .$text.$value['category_name'].'</option>';             
                    $this->res($value['id'], $text.'--');
                 }  
         }
         return $this->html;         
       }
}
