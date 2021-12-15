<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class ProfileService{
    public function checkVisibility(User $user){
        return Gate::check('self') || $user->visibilities['profile'];
    }

    public function updateProfile(User $user){
        request()->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users', 'username')->ignore($user)],
            'email' => "email|required",
            'password' => 'sometimes',
            'image' => 'sometimes'
        ]);

        if(request('password') === null){
            request()->remove('password');
        }

        if(request('image') === null){
            request()->remove('image');
        }

        dd(request()->all());

        // $user->update($attributes);
    }
}
