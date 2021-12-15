<?php

namespace App\Http\Controllers;

use App\Models\User;


class VisibilityController extends Controller
{
    public function index(User $user){
        return view('profile.visibilities', [
            'username' => $user->username,
            'visibilities' => [
                'profile' => $user->visibilities->profile,
                'bookmarks' => $user->visibilities->bookmarks,
                'followings' => $user->visibilities->followings,
                'followers' => $user->visibilities->followers,
                'posts' => $user->visibilities->posts
            ]
        ]);
    }

    public function update(User $user){
        $attributes = request()->validate([
            'profile' => 'boolean',
            'followings' => 'boolean',
            'followers' => 'boolean',
            'posts' => 'boolean'
        ]);

        $user->visibilities->update($attributes);

        return redirect()->back();
    }
}
