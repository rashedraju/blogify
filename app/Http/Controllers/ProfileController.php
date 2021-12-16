<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\VisibilityService;
use App\Http\Requests\ProfileUpdateRequest;

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

    public function update(ProfileUpdateRequest $request, User $user){
        $attribute = $request->validated();

        if($request->hasFile('image')){
            $profileImagePath = $request->file('image')->store('profile');
            $attribute['image'] = $profileImagePath;
        }

        $user->update($attribute);

        return back()->with('success', 'Profile Update Successfully');
    }
}
