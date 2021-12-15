<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\VisibilityService;

class FollowingsController extends Controller
{
    protected $visibilityService;

    public function __construct(VisibilityService $visibilityService)
    {
        $this->visibilityService = $visibilityService;
    }

    public function index( User $user ) {
        return view('profile.followings', [
            'username' => $user->username,
            'followings' => $user->followings,
            'visibility' => $this->visibilityService->checkVisibility($user, 'followings')
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
