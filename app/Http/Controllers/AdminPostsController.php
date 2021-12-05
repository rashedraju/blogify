<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = $this->postValidate();

        $path = request()->file('thumbnail')->store('thumbnails');

        $attributes = array_merge($attributes, [
            'user_id' => auth()->user()->id,
            'thumbnail' => $path
        ]);

        Post::create($attributes);

        return redirect('admin/posts');
    }

    public function edit(Post $post)
    {
        return view('admin/posts/edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->postValidate($post);

        if (request('thumbnail')) {
            $path = request()->file('thumbnail')->store('thumbnails');
            $attributes['thumbnail'] = $path;
        }

        $attributes['user_id'] = auth()->user()->id;

        $post->update($attributes);

        return redirect('admin/posts')->with('success', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success', 'Post updated');
    }

    protected function postValidate(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => $post->exists ? 'image' : 'required|image',
            'excerpt' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'body' => 'required'
        ]);
    }
}
