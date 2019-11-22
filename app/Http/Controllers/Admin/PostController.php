<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use App\Media;
use App\Post;
use App\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
//        $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get()->toArray();
        $media = Media::orderBy('created_at','desc')->paginate(3);

        return view('admin.posts.create', compact('tags','categories','media'));
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
            'description' => 'required',
            'media_id'=>'required',
            'tag_id' => 'required',
            'category_id' => 'required'

        ]);

        $post = auth()->user()->publish(
            new Post(request(['title', 'description']))
        );

        $post->tags()->attach(request('tag_id'));
        $post->categories()->attach(request('category_id'));
        $post->media()->attach(request('media_id'));

        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
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
        $categories = Category::all();

        return view('admin.posts.edit', compact('post','tags','categories'));
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

        return redirect()->route('admin.posts.index')->with('success','Edited successfully!');

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
        return back()
            ->with('success','Deleted successfully!');
    }
}
