<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPostRequest;
use App\Models\Post;

class AdminPostsController extends Controller
{
    protected $adminPostService;

    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::all()]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(AdminPostRequest $request)
    {
        $attributes = $request->validated();

        if($request->hasFile('thumbnail')){
            $path = $request->file('thumbnail')->store("thumbnails");

            $attributes = array_merge($attributes, [
                'user_id' => auth()->user()->id,
                'thumbnail' => $path
            ]);
        }

        Post::create($attributes);

        return redirect('admin/posts');
    }

    public function edit(Post $post)
    {
        return view('admin/posts/edit', ['post' => $post]);
    }

    public function update(AdminPostRequest $request, Post $post)
    {
        $attributes = $request->validated();

        if($request->hasFile('thumbnail')){
            $path = $request->file('thumbnail')->store("thumbnails");

            $attributes = array_merge($attributes, [
                'thumbnail' => $path
            ]);
        }

        $post->update($attributes);

        return redirect('admin/posts')->with('success', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success', 'Post updated');
    }
}
