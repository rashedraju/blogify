<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Validation\Rule;
use App\Notifications\NewPostNotification;

class AdminPostService{
    public function createPost(){
        $attributes = $this->postValidate();

        $path = request()->file('thumbnail')->store('thumbnails');

        $attributes = array_merge($attributes, [
            'user_id' => auth()->user()->id,
            'thumbnail' => $path
        ]);

        $post = Post::create($attributes);

        // Send mail notificaton to all followers
        $followers = $post->author->followers;

        foreach ($followers as $follower) {
            $details = [
                'title' => $post->title,
                'excerpt' => $post->excerpt,
                'link' => url("/") . '/posts/' . $post->slug
            ];

            $follower->notify(new NewPostNotification($details));
        }
    }

    public function updatePost(Post $post){
        $attributes = $this->postValidate($post);

        if (request('thumbnail')) {
            $path = request()->file('thumbnail')->store('thumbnails');
            $attributes['thumbnail'] = $path;
        }

        if($attributes['author_id']){
            $attributes = array_merge([
                'user_id' => $attributes['author_id'] ?? auth()->user()->id,
            ], $attributes);

            unset($attributes['author_id']);
        }

        $post->update($attributes);
    }

    protected function postValidate(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'author_id' => Rule::exists('users', 'id'),
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => $post->exists ? 'image' : 'required|image',
            'excerpt' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'status_id' => Rule::exists('statuses', 'id'),
            'body' => 'required'
        ]);
    }
}

