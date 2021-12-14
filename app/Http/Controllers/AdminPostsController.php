<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\AdminPostService;

class AdminPostsController extends Controller
{
    protected $adminPostService;

    public function __construct(AdminPostService $adminPostService)
    {
        $this->adminPostService = $adminPostService;
    }

    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::all()]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $this->adminPostService->createPost();

        return redirect('admin/posts');
    }

    public function edit(Post $post)
    {
        return view('admin/posts/edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $this->adminPostService->updatePost($post);

        return redirect('admin/posts')->with('success', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success', 'Post updated');
    }
}
