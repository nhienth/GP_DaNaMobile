<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        // dd($posts);
        return view('admin.posts.list', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $cate = new CategoryController();
        $categorySelect = $cate->res(0);
        return view('admin.posts.create', compact('categorySelect'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request -> title;
        $post->summary = $request -> summary;
        $post->content = $request -> content;
        $imgpath = $_FILES['post_img']['name'];
        $target_dir = "../public/images/post/";
        $target_file =  $target_dir . basename($imgpath);
        move_uploaded_file($_FILES['post_img']['tmp_name'], $target_file);
        $post->post_img = $imgpath;
        $post->category_id = $request -> category_id;
        $post->added_by = 0;
        $post->status = 0;
        $post->save();

        return redirect('/admin/post/list')->with('messenger','Thêm bài viết thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::find($id);
        return view('admin.posts.details', compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = new CategoryController();
        $categorySelect = $cate->res(0);
        $post = Post::find($id);
        return view('admin.posts.edit', compact(['post', 'categorySelect']));
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
        
        $post = Post::find($id);
        $post->title = $request -> title;
        $post->summary = $request -> summary;
        $post->content = $request -> content;

        $imgpath = $_FILES['post_img']['name'];
        if($imgpath != '') {
            $target_dir = "../public/images/post/";
            $target_file =  $target_dir . basename($imgpath);
            move_uploaded_file($_FILES['post_img']['tmp_name'], $target_file);
            $post->post_img = $imgpath;
        }
      
        $post->category_id = $request -> category_id;
        $post->added_by = 0;
        $post->status = 0;
        $post->save();

        return redirect('/admin/post/list')->with('messenger','Cập nhật bài viết thành công');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/admin/post/list')->with('messenger','Bài viết đã bị xóa');
    }
}
