<?php

namespace App\Http\Controllers;

use App\Category;
use App\Media;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get()->toArray();
        $media = Media::orderBy('created_at','desc')->paginate(3);

        return view('posts.create', compact('tags','categories','media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'

        ]);
//       dd($request->all());

        $post = auth()->user()->publish(
            new Post(request(['title', 'description']))
        );


        $post->tags()->attach(request('tag_id'));
        $post->categories()->attach(request('category_id'));
        $post->media()->attach(request('media_id'));

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);
        $tags = Tag::all();
        $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get()->toArray();

        return view('posts.edit', compact('post','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update(request(['title', 'description']));
        $post->tags()->sync(request('tag_id'));
        $post->categories()->sync(request('category_id'));

        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);
        $post->delete();
        return redirect('/posts');
    }
}
