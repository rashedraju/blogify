<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index(User $user){
        return view('profile.index', [
            'user' => $user,
            'visibility' => $this->profileService->checkVisibility($user)
        ]);
    }

    public function update(ProfileRequest $profileRequest, User $user){
        $attribute = $profileRequest->validated();

        if($profileRequest->has('image')){
            $profileImagePath = $profileRequest->file('image')->store('profile');
            $attribute['image'] = $profileImagePath;
        }

        $user->update($attribute);

        return back()->with('success', 'Profile Update Successfully');
    }
}
