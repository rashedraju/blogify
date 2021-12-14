<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller {
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index() {
        $posts =  $this->postService->index();

        return view( 'posts.index', ['posts' => $posts] );
    }

    public function show(Post $post) {
        $post->increment('views', 1);

        return view( 'posts.show', ['post' => $post] );
    }
}
