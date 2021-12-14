<?php

namespace App\Services;

use App\Models\Post;

class PostCommentsService{
    public function createComment(Post $post){
        // validate
        request()->validate(['body' => 'required']);

        // create comment
        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => request('body')
        ]);
    }
}

