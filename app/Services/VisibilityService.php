<?php

namespace App\Services;

use App\Models\User;
use App\Models\Visibility;
use Illuminate\Support\Facades\Gate;

class VisibilityService{
    public function create(User $user){
        Visibility::create(['user_id' => $user->id]);
    }

    public function checkVisibility(User $user, string $availity){
        return Gate::check('self') || $user->visibilities[$availity];
    }
}
