<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CategoryController;
use App\Models\Post;
use App\Models\PostReview;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function searchs()
    {
        $keywords = $_GET['key_cate_id'];
        $categories = Category::all();
        $posts = Post::where('category_id','=', $keywords)->paginate(5);
        if (count($posts) != 0) {
            return view('admin.posts.list',compact('posts','categories'));
        } else if ( count($posts) == 0) {
            $posts = Post::with('category')->orderBy('posts_id','desc')->paginate(5);
            return view('admin.posts.list',compact('posts','categories'));
        }
    }


    public function filter_view()
    {
        $keywords = $_GET['view_selected'];
        $categories = Category::all();
        $posts = Post::all();
        if ($keywords == 1) {
            $posts = Post::with('category')->orderBy('posts.added_by','desc')->paginate(5);
            return view ('admin.posts.list',compact('posts', 'categories'));
        } else if ($keywords == 2) {
            $posts = Post::with('category')->orderBy('posts.added_by','asc')->paginate(5);
            return view ('admin.posts.list',compact('posts', 'categories'));
        } else {
            $posts = Post::with('category')->orderBy('posts.id','asc')->paginate(5);
            return view ('admin.posts.list',compact('posts', 'categories'));
        }
    }


    public function filter_status()
    {
        $keywords = $_GET['status_selected'];
        $categories = Category::all();
        $posts = Post::where('status', '=',$keywords)->paginate(5);
        if ($keywords != 2) {
            return view('admin.posts.list',compact('posts','categories'));
        } else {
            $posts = Post::with('category')->paginate(5);
            return view('admin.posts.list',compact('posts','category'));
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderBy('posts.created_at', 'DESC')->paginate(5);
        // dd($posts);
        return view('admin.posts.list', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllPost()
    {
        $allPost = Post::with('category')->orderBy('posts.created_at', 'DESC')->get();
        // dd($posts);
        return view('client.blogs.post', compact('allPost'));
    }

    public function showclient($id)
    {

        $post = Post::find($id);
        $previews = PostReview::where('posts_id',$id)->get();
        return view('client.blogs.detail', compact('post','previews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $kyw = $request->keyword;


        $posts = Post::with(['category'])
            ->where('posts.title', 'LIKE', '%' . $kyw . '%')
            ->orWhere('posts.summary', 'LIKE', '%' . $kyw . '%')
            ->orderBy('posts.id', 'desc')
            ->get();


        return view('client.blogs.index', compact('posts'));
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
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->content = $request->content;
        $imgpath = $_FILES['post_img']['name'];
        $target_dir = "../public/images/post/";
        $target_file =  $target_dir . basename($imgpath);
        move_uploaded_file($_FILES['post_img']['tmp_name'], $target_file);
        $post->post_img = $imgpath;
        $post->category_id = $request->category_id;
        $post->added_by = 0;
        $post->status = 0;
        $post->save();

        return redirect('/admin/post/list')->with('success', 'Thêm bài viết thành công');
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
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->content = $request->content;

        $imgpath = $_FILES['post_img']['name'];
        if ($imgpath != '') {
            $target_dir = "../public/images/post/";
            $target_file =  $target_dir . basename($imgpath);
            move_uploaded_file($_FILES['post_img']['tmp_name'], $target_file);
            $post->post_img = $imgpath;
        }

        $post->category_id = $request->category_id;
        $post->added_by = 0;
        $post->status = 0;
        $post->save();

        return redirect('/admin/post/list')->with('messenger', 'Cập nhật bài viết thành công');
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
        return redirect('/admin/post/list')->with('messenger', 'Bài viết đã bị xóa');
    }
}