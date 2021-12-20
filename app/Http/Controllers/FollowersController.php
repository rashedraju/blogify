<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\VisibilityService;

class FollowersController extends Controller {

    public function index( User $user, VisibilityService $visibilityService ) {
        return view('profile.followers', [
            'username' => $user->username,
            'followers' => $user->followers,
            'visibility' => $visibilityService->checkVisibility($user, 'followers'),
        ]);
    }

    public function remove(User $user, $id){
        $user->followers()->detach($id);

        return redirect()->back();
    }
}
