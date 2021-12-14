<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostCommentsService;

class PostCommentsController extends Controller
{
    protected $postCommentsService;

    public function __construct(PostCommentsService $postCommentsService)
    {
        $this->postCommentsService = $postCommentsService;
    }

    public function store(Post $post ){
        $this->postCommentsService->createComment($post);

        return back();
    }
}
