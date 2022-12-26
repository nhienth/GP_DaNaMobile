<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PostsList= Post::with('Category', 'User')->where('posts.status', '=', 0)->orderBy('posts.created_at', 'DESC')->get();
        return view("admin.posts.list", compact("PostsList"));
        //compact là để chuyển dữ liệu từ thèn controller lên thèn view
        //Khi nào show dữ liệu ra mới dùng compact
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
        
        $NewPost = new Post();
        $NewPost->title= $request->title;
        $NewPost->summary= $request->summary;
        $NewPost->content= $request->content;
        $imgpath = $_FILES['post_img']['name'];
        $target_dir = "../public/images/post/";
        $target_file =  $target_dir . basename($imgpath);
        move_uploaded_file($_FILES['post_img']['tmp_name'], $target_file);
        $NewPost->post_img= $imgpath;
        $NewPost->category_id= $request->category_id;
        $NewPost->added_by = Auth::id();
        $NewPost->status= 0;
        $NewPost->save();
        return redirect('/admin/post/list')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Post = Post::find($id);
        return view('admin.posts.details', compact('Post'));
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
        $Post= Post::where('posts.id', $id)->first();
        return view("admin.posts.edit", compact("Post", "categorySelect"));
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
        $Post = Post::where('posts.id', $id)->first();
        $Post->title= $request->title;
        $Post->summary= $request->summary;
        $Post->content= $request->content;
        $imgpath = $_FILES['post_img']['name'];
        $target_dir = "../public/images/post/";
        $target_file =  $target_dir . basename($imgpath);
        move_uploaded_file($_FILES['post_img']['tmp_name'], $target_file);
        $Post->post_img= $imgpath;
        $Post->category_id= $request->category_id;
        $Post->save();

        return redirect('/admin/post/list')->with('success');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post= Post::find($id);
        // where('posts.id', $id)->first()
        $Post->delete();
        return redirect('/admin/post/list')->with('success');
    }


    public function listClient()
    {
        $allPost= Post::where('status', '=', 0)->get();
        $bannerlist = Banner::where('id', '<>', '9')->get();
        return view('client.blogs.post', compact('allPost', 'bannerlist'));
    }

    public function detailClient($id)
    {
        $findPost= Post::find($id);
        $preView = Post::with('Preview','User')->get();
        $allPost= Post::where('status', '=', 0)->get();
        $bannerlist = Banner::where('id', '<>', '9')->get();
        return view('client.blogs.detail', compact('findPost', 'bannerlist', 'allPost', 'preView'));
    }

    
}
