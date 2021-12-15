<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\VisibilityService;

class FollowersController extends Controller {
    protected $visibilityService;

    public function __construct(VisibilityService $visibilityService)
    {
        $this->visibilityService = $visibilityService;
    }

    public function index( User $user ) {
        return view('profile.followers', [
            'username' => $user->username,
            'followers' => $user->followers,
            'visibility' => $this->visibilityService->checkVisibility($user, 'followers'),
        ]);
    }

    public function remove(User $user, $id){
        $user->followers()->detach($id);

        return redirect()->back();
    }
}
