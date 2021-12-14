<?php

namespace App\Services;

use App\Models\Post;

class PostService{
    public function index(){
        return Post::latest()->filter(
            array_merge( ['status' => 'published'], request( ['search', 'categories', 'author'] ) )
        )->paginate( 10 );
    }
}

