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
        $categories = Category::all();
        foreach ($categories as $category) {
            $parent_id = $category->parent_id;
            $partenCateName = $this->getCategoryName($parent_id);
            $category['parent_cate'] = $partenCateName;
        }
        return view('admin.categories.list', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorySelect = $this->res(0);
        return view('admin.categories.create', compact('categorySelect'));
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
        $cate->category_name = $request['category_name'];
        $cate->category_image = $request['category_image'];
        $cate->parent_id = $request['parent_id'];
        $cate->save();

        // Category::create($request->all());
        $categorySelect = $this->res(0);
        return $this->index();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        // $cate -> parent_id = $request['parent_id'];
        $categorySelect = $this->res_selected(0, $category->parent_id, $id);
        return view('admin.categories.edit', compact('categorySelect', 'category'));
    }

    public function getCategoryName($id) {
        if($id != 0) {
            $category = Category::find($id);
            return $category->category_name;
        }
    }

    function res_selected($i, $parent_id, $id, $text = '')
    {
        $data = Category::all();
        foreach ($data as $value) {
            if ($value['parent_id'] == $i) {
                if ($value['id'] == $parent_id) {
                    if ($value['id'] == $id) {
                        $this->html .= '<option value="' . $value['id'] . '" style="display: none;">' . $text . $value['category_name'] . '</option>';
                        $this->res_selected($value['id'], $parent_id, $id, $text . '--');
                    } else {
                        $this->html .= '<option value="' . $value['id'] . '" selected>' . $text . $value['category_name'] . '</option>';
                        $this->res_selected($value['id'], $parent_id, $id, $text . '--');
                    }
                } else {
                    if ($value['id'] == $id) {
                        $this->html .= '<option value="' . $value['id'] . '" style="display: none;">' . $text . $value['category_name'] . '</option>';
                        $this->res_selected($value['id'], $parent_id, $id, $text . '--');
                    } else {
                        $this->html .= '<option value="' . $value['id'] . '" >' . $text . $value['category_name'] . '</option>';
                        $this->res_selected($value['id'], $parent_id, $id, $text . '--');
                    }
                }
            }
        }
        return $this->html;
    }

    function res_selected1($parent_id, $text = '')
    {
        $data = Category::all();
        foreach ($data as $value) {
            if ($value['parent_id'] == $parent_id) {
                $this->html .= '<option value="' . $value['id'] . '">' . $text . $value['category_name'] . '</option>';
                $this->res($value['id'], $text . '--');
            }
        }
        return $this->html;
    }


    public function res($id, $text = '')
    {
        $data = Category::all();
        foreach ($data as $value) {
            if ($value['parent_id'] == $id) {
                $this->html .= '<option value="' . $value['id'] . '">' . $text . $value['category_name'] . '</option>';
                $this->res($value['id'], $text . '--');
            }
        }
        return $this->html;
    }

    public function res_selected_category($id, $text = ''){
        $data = Category::all();
        // dd($id, $text);
        foreach ($data as $value) {
            if($value['id'] == $id) {
                $this->html .= '<option value="' . $value['id'] . '" selected>' . $text . $value['category_name'] . '</option>';
                $this->res($value['id'], $text . '--');
            }else{
                $this->html .= '<option value="' . $value['id'] . '">' . $text . $value['category_name'] . '</option>';
                $this->res($value['id'], $text . '--');
            }
        }
        return $this->html;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cate =  Category::find($id);
        $cate->category_name = $request['category_name'];
        $cate->parent_id = $request['parent_id'];
        $cate->save();
        $categorySelect = $this->res(0);

        return redirect('admin/category/list');


        // $categories = Category::all();
        // return view('admin.categories.list', compact('categorySelect'), ['categoryList' => $categories]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $category = Category::find($id);
        // $category->delete();
        // $this->deleteRes($id);
        // return $this->index();
        $category = Category::find($id);
        $categories = Category::all();
        foreach ($categories as $key) {
            if ($key['parent_id'] == $id) {
                $cate = Category::find($key['id']);
                $cate->delete();
            }
        }
        $category->delete();
        return $this->index();
    }

    public function deleteRes($id)
    {
        $category = Category::find($id);
        $category->delete();
        $categories = Category::all();
        foreach ($categories as $key) {
            if ($key['parent_id'] == $id) {
                $cate = Category::find($categories['id']);
                $cate->delete();
            }
        }
        return $this->index();
    }
}