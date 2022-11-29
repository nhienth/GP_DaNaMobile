<?php

namespace App\Http\Controllers;
use App\Models\Specification;
use App\Models\Category;

use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $specifications_list = Specification::with(['category'])->get();
        return view('admin/specifications/list')->with(compact('specifications_list', 'categories'));
    }

    public function create(){
        $cate = new CategoryController();
        $categorySelect = $cate->res_delete_children(0);
        return view('admin.specifications.create', compact(['categorySelect']));
    }

    public function store(Request $request){
        $specification = new Specification();
        $specification->specification_name = $request->specification_name;
        $specification->category_id = $request->category_id;
        $specification->save();
        return redirect('/admin/specification/list');

    }

    public function getNameCate($id){
        if($id != 0){
            $cate =  Category::find($id);
            return $cate->category_name;
        }
    }

    public function edit($id)
    {      
        $specification = Specification::with('category')->where('product_specifications_options.id', $id)->first();
        $cate = new CategoryController();
        $categorySelect = $cate->res_selected_category($specification->category_id);
        return view('admin.specifications.edit', compact(['specification', 'categorySelect']));
    }

    public function update(Request $request, $id)
    {
        $specification = Specification::find($id);
        $specification->specification_name = $request->specification_name;
        $specification->category_id = $request->category_id;
        $specification->save();
        return redirect('/admin/specification/list');
    }

    public function destroy($id)
    {
        $specification = Specification::find($id);
        $specification->delete();
        return $this->index();
    }

    public function search(){
        $keyword = $_GET['key_search'];
        $specifications_list = Specification::with(['category'])->where('specification_name','LIKE', '%' . $keyword . '%')->get();
        return view('admin.specifications.list', compact('specifications_list'));
    }

    public function name(){
        $key = $_GET['name'];      
        if($key == 0){
            $specifications_list = Specification::with(['category'])->get();
            return view('admin.specifications.list', compact('specifications_list'));
        }else if( $key == 1){
            $specifications_list = Specification::with(['category'])->orderBy('specification_name', 'DESC')->get();
            return view('admin.specifications.list', compact('specifications_list'));
        }else{
            $specifications_list = Specification::with(['category'])->orderBy('specification_name', 'ASC')->get();
            return view('admin.specifications.list', compact('specifications_list'));
        }
    }

    public function category(){
        $key = $_GET['category'];      
        if($key == 0){
            $specifications_list = Specification::with(['category'])->get();
            return view('admin.specifications.list', compact('specifications_list'));
        }else if( $key == 1){
            $categories = Category::all();
            foreach ($categories as $category) {
                $parent_id = $category->parent_id;
                $partenCateName = $this->getCategoryName($parent_id);
                $category['parent_cate'] = $partenCateName;
            }
            $specifications_list = Specification::with(['category'])->orderBy('specification_name', 'DESC')->get();
            return view('admin.specifications.list', compact('specifications_list', 'categories'));
        }else{
            $categories = Category::all();
            foreach ($categories as $category) {
                $parent_id = $category->parent_id;
                $partenCateName = $this->getCategoryName($parent_id);
                $category['parent_cate'] = $partenCateName;
            }
            $specifications_list = Specification::with(['category'])->orderBy('specification_name', 'ASC')->get();
            return view('admin.specifications.list', compact('specifications_list', 'categories'));
        }
    }
}
