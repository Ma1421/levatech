<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\Category;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {

        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(5)]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使いい、インスタンス化した$postを代入。
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }
    
    public function store(Post $post, PostRequest $request)
    
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {

        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    }
?>