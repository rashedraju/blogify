<?php

namespace App\Http\Controllers;

use App\Models\User;


class VisibilityController extends Controller
{
    public function index(User $user){
        return view('profile.visibilities', [
            'user' => $user
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

        return back();
    }
}
