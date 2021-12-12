<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class FollowingsController extends Controller
{
    public function index( User $user ) {
        return view('profile.followings', [
            'username' => $user->username,
            'followings' => $user->followings,
            'visibility' => Gate::forUser($user)->allows('visibility', 'followings')
        ]);
    }

    public function follow(User $user, $id) {
        $user->followings()->attach($id);

        return redirect()->back();
    }

    public function unfollow(User $user, $id){
        $user->followings()->detach($id);

        return redirect()->back();
    }
}
