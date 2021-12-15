<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\VisibilityService;

class ProfileController extends Controller
{
    protected $visibilityService;

    public function __construct(VisibilityService $visibilityService)
    {
        $this->visibilityService = $visibilityService;
    }

    public function index(User $user){
        return view('profile.index', [
            'user' => $user,
            'visibility' => $this->visibilityService->checkVisibility($user, 'profile')
        ]);
    }
}
