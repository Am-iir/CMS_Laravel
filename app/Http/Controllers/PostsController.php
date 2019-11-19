<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index(){

        $posts = Post::orderBy('created_at','desc')->paginate(3);

        return view('frontend.home', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('frontend.singlePost', compact('post'));
    }
}
