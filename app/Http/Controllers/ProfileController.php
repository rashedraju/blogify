<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function index(User $user){
        return view('profile.index', [
            'user' => $user,
            'visibility' => Gate::forUser($user)->allows('visibility', 'profile')
        ]);
    }
}
