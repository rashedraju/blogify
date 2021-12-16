<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller {
    public function index() {
        $posts = Post::latest()->filter(
            array_merge( ['status' => 'published'], request( ['search', 'categories', 'author'] ) )
        )->paginate( 10 );

        return view( 'posts.index', ['posts' => $posts] );
    }

    public function show(Post $post) {
        $post->increment('views', 1);

        return view( 'posts.show', ['post' => $post] );
    }
}
