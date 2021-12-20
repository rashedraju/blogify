<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\VisibilityService;

class FollowingsController extends Controller
{

    public function index( User $user, VisibilityService $visibilityService ) {
        return view('profile.followings', [
            'username' => $user->username,
            'followings' => $user->followings,
            'visibility' => $visibilityService->checkVisibility($user, 'followings')
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
