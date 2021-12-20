<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\VisibilityService;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show(User $user, VisibilityService $visibilityService){
        return view('profile.index', [
            'user' => $user,
            'visibility' => $visibilityService->checkVisibility($user, 'profile')
        ]);
    }

    public function update(ProfileUpdateRequest $request, User $user){

        $this->authorize('update', $user);

        $attribute = $request->validated();

        if($request->hasFile('image')){
            $profileImagePath = $request->file('image')->store('profile');
            $attribute['image'] = $profileImagePath;
        }

        $user->update($attribute);

        return back()->with('success', 'Profile Update Successfully');
    }
}
