<?php

namespace App\Http\Controllers;

use App\Models\Post;

class FeedController extends Controller {
    public function feed() {
        return response()->view( 'feed', [
            'posts' => Post::filter( ['status' => 'published'] )->get()
        ] )->header( 'Content-Type', 'application/xml' );
    }
}
