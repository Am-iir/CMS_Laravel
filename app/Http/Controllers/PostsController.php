<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\Contact;
use App\Page;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index()
    {
        $featuredPosts = Post::FeaturePosts();
        $recentPosts = Post::recentPosts();

        return view('front.home',compact('recentPosts','featuredPosts'));
    }

    public function show(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('front.posts.single', compact('post','tags','categories'));
    }

    public function page($slug)
    {
        $page = Page::query()->where('slug', $slug)->first();

        abort_if(!$page ? true : false, 404);

        $slug = $page->slug;

        return view('front.' . $slug, compact('page'));

    }

    public function sendMessage(Request $request)
    {
        $validate = Validator:: make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()], 422);
        }

        $data = $request->all();

//        SendEmailJob::dispatch($data);
        Mail::queue(new Contact($data));
        return response()->json();
    }
}
