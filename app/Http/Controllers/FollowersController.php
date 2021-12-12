<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class FollowersController extends Controller {
    public function index( User $user ) {
        return view('profile.followers', [
            'username' => $user->username,
            'followers' => $user->followers,
            'visibility' => Gate::forUser($user)->allows('visibility', 'followers')
        ]);
    }

    public function remove(User $user, $id){
        $user->followers()->detach($id);

        return redirect()->back();
    }
}
