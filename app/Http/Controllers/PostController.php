<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(1)]);  
    }
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使いい、インスタンス化した$postを代入
       public function create(Category $category)
{
    return view('posts/create')->with(['categories' => $category->get()]);
}
    
}
?>